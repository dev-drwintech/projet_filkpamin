<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Jobs\ConvertForStreaming;
use App\Models\Order;
use App\Models\Video;
use App\Models\User;
use App\Models\Role;
use App\Models\Payment;
use App\Models\Portefeuille;
use App\Models\parametre_retrait;
use App\Models\historique_retrait;
use App\Models\HistoriqueRetrait;
use App\Models\VideoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Pion\Laravel\ChunkUpload\Exceptions\UploadFailedException;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use App\Notifications\VideoReceivedNotification;
use App\Notifications\VideoPublishedNotification;
use App\Notifications\RetraitAccepteNotification;

class VideoController extends Controller
{
    /**
     * Affiche une liste des vidéos disponibles.
     */
    public function index()
    {
        // Récupère les vidéos avec les informations de l'utilisateur et les pagine
        $videos = Video::with('user')
            ->latest()
            ->paginate();

        // Renvoie la vue index avec les vidéos
        return view('backend.video.index', compact('videos'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle vidéo.
     */
    public function create()
    {
        // Récupère toutes les catégories de vidéos (genres)
        $genres = VideoCategory::all();

        // Renvoie la vue de création avec les genres disponibles
        return view('backend.video.create', compact('genres'));
    }

    /**
     * Enregistre une nouvelle vidéo dans la base de données.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'runtime' => 'required|integer',
            'year' => 'required|integer',
            'genres' => 'required|array',
            'genres.*' => 'required|string',
            'directors' => 'required|array',
            'directors.*' => 'required|string',
            'actors' => 'required|array',
            'actors.*' => 'required|string',
            'photos' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:7168', // Changez en fonction de votre besoin
            'type' => 'required|string|max:50',
            'status' => 'required|boolean',
            'demo' => 'file|mimes:mp4,webm,mkv,wmv',
            'video' => 'required|file|mimes:mp4,webm,mkv,wmv',
        ]);

        // Convertit le tableau des acteurs en une chaîne JSON
        $actors = json_encode($request->input('actors'));

        // Prépare les données pour l'insertion
        $data = [
            'user_id' => auth()->id(),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'runtime' => $request->input('runtime'),
            'year' => $request->input('year'),
            'genres' => json_encode($request->input('genres')),
            'directors' => json_encode($request->input('directors')),
            'actors' => $actors,
            'photos' => $request->file('photos')->store('photos/couverture', 'public'), // Gérer le téléchargement des images de couvertures
            'type' => $request->input('type'),
            'demo' => $request->file('demo')->store('Demo', 'public'), // Gérer le téléchargement des demos
            'video' => $request->file('video')->store('videos/streaming', 'public'), // Gérer le téléchargement des videos
            'status' => $request->input('status'),
        ];

        // Crée une nouvelle vidéo
        $video = Video::create($data);

        // Lance un job pour convertir la vidéo pour le streaming
        $this->dispatch(new ConvertForStreaming($video));

        // Message de succès et redirection
        session()->flash('message', 'Félicitation nouveau ' . $video->type . ' ' . $video->title . ' télécharger avec succès!');
        session()->flash('type', 'success');
        return redirect()->back();
    }

    /** Enrégistrement des vidéos à soumttre (partenaire) */
    public function create_partenaire()
    {
        // Récupère toutes les catégories de vidéos (genres)
        $genres = VideoCategory::all();

        // Renvoie la vue de création avec les genres disponibles
        return view('frontend.partenaire.telechargement', compact('genres'));
    }

    public function store_partenaire(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'runtime' => 'required|integer',
            'year' => 'required|integer',
            'genres' => 'required|array',
            'genres.*' => 'required|string',
            'directors' => 'required|array',
            'directors.*' => 'required|string',
            'actors' => 'required|array',
            'actors.*' => 'required|string',
            'photos' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:7168',
            'type' => 'required|string|max:50',
            'demo' => 'nullable|file|mimes:mp4,webm,mkv,wmv',
            'video' => 'required|file|mimes:mp4,webm,mkv,wmv',
        ]);

        // Convertir le tableau d'acteurs en chaîne JSON
        $actors = json_encode($request->input('actors'));

        // Préparation des données à insérer
        $data = [
            'user_id' => auth()->id(),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'runtime' => $request->input('runtime'),
            'year' => $request->input('year'),
            'genres' => json_encode($request->input('genres')),
            'directors' => json_encode($request->input('directors')),
            'actors' => $actors,
            'photos' => $request->file('photos')->store('photos/couverture', 'public'),
            'type' => $request->input('type'),
            'demo' => $request->hasFile('demo')
                ? $request->file('demo')->store('Demo', 'public')
                : null,
            'video' => $request->file('video')->store('videos/streaming', 'public'),
            'status' => 0,
        ];

        // Création de la nouvelle vidéo
        $video = Video::create($data);

        // Lancer le job de conversion pour le streaming
        $this->dispatch(new ConvertForStreaming($video));

        $video->load('user');

        // Récupérer l'administrateur
        $adminRole = Role::where('nom', 'admin')->first();

        $admin = User::where('role_id', $adminRole->id)->first();

        // Envoyer la notification
        if ($admin) {
            $admin->notify(new VideoReceivedNotification($video));
        }

        // Message de succès et redirection
        session()->flash('message', 'Félicitation nouveau ' . $video->type . ' "' . $video->title . '" envoyé avec succès en attente de validation !');
        session()->flash('type', 'success');
        return redirect()->back();
    }



    /**
     * Affiche le formulaire d'édition d'une vidéo existante.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Récupère la vidéo à éditer par son ID
        $video = Video::findOrFail($id);

        $video->actors = json_decode($video->actors);

        // Récupère toutes les catégories de vidéos (genres)
        $genres = VideoCategory::all();

        // Renvoie la vue d'édition avec les données de la vidéo et les genres
        return view('backend.video.edit', compact('video', 'genres'));
    }

    
    /**
     * Met à jour les informations d'une vidéo existante.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'runtime' => 'required|integer',
            'year' => 'required|integer',
            'genres' => 'required|array',
            'genres.*' => 'required|string',
            'directors' => 'required|array',
            'directors.*' => 'required|string',
            'actors' => 'required|array',
            'actors.*' => 'required|string',
            'photos' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:7166', // Changez en fonction de votre besoin
            'type' => 'required|string|max:50',
            'status' => 'required|boolean',
            'video' => 'file|mimes:mp4,webm,mkv,wmv',
            'demo' => 'file|mimes:mp4,webm,mkv,wmv',
        ]);

        $video = Video::findOrFail($id);


        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'runtime' => $request->input('runtime'),
            'year' => $request->input('year'),
            'genres' => json_encode($request->input('genres')),
            'directors' => json_encode($request->input('directors')),
            'actors' => json_encode($request->input('actors')),
            'photos' => $request->hasFile('photos') ? $request->file('photos')->store('photos/couverture', 'public') : $video->photos,
            'type' => $request->input('type'),
            'video' => $request->hasFile('video') ? $request->file('video')->store('videos/streaming', 'public') : $video->video,
            'status' => 0,
        ];

        // Ajoute la condition pour le champ 'demo'
        if ($request->hasFile('demo')) {
            $data['demo'] = $request->file('demo')->store('Demo', 'public');
        } else {
            $data['demo'] = $video->demo; // Conserve la valeur actuelle si aucun fichier 'demo' n'est fourni
        }

        $video->update($data);

        session()->flash('message', 'Vidéo mise à jour avec succès !');
        session()->flash('type', 'success');
        return redirect()->route('videos.index');
    }


    /**
     * Supprime une vidéo de la base de données.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy($id)
    {
        // Récupère la vidéo à supprimer
        $video = Video::findOrFail($id);

        // Chemin du fichier vidéo
        $videoPath = public_path('storage/videos/streaming' . $video->video);

        // Vérifie si le fichier vidéo existe et le supprime
        if (file_exists($videoPath)) {
            @unlink($videoPath);
        }

        // Supprime l'entrée de la vidéo dans la base de données
        $video->delete();

        // Message de succès et redirection
        session()->flash('message', 'Vidéo supprimer avec succès !');
        session()->flash('type', 'success');
        return redirect()->back();
    }

    /**
     * Gère le téléchargement de gros fichiers en morceaux.
     *
     * @param \Illuminate\Http\Request $request
     * @throws UploadFailedException
     */
    public function uploadLargeFiles(Request $request)
    {

        // Crée un récepteur de fichier pour gérer les téléchargements en morceaux
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        // Vérifie si le fichier a été téléchargé
        if (!$receiver->isUploaded()) {
            // fichier non télécharger
        }

        // Reçoit le fichier
        $fileReceived = $receiver->receive();
        if ($fileReceived->isFinished()) {
            // Si le téléchargement est terminé, obtient le fichier
            $file = $fileReceived->getFile();

            // Crée un nom de fichier unique
            $fileName = Str::uuid() . '.' . '-' . $file->getClientOriginalExtension();

            // Enregistre le fichier dans le stockage local
            $path = Storage::disk('public')->putFileAs('videos/streaming', $file, $fileName);

            // Supprime le fichier temporaire
            unlink($file->getPathname());

            return [
                'path' => $path,
                // 'url' => Storage::url($path),
            ];
        }

        // Sinon, renvoie les informations de progression
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];
    }

    public function videosEnAttente()
    {
        $videosEnAttente = Video::with('user')
            ->where('status', 0)
            ->select('id', 'title', 'type', 'genres', 'user_id', 'created_at')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('backend.videos_en_attente.index', compact('videosEnAttente'));
    }

    public function demandePaiement($id = null)
    {
        $demandePaiement = HistoriqueRetrait::with('user', 'parametreRetrait', 'portefeuille')
            ->where('status', 0)
            ->orderBy('created_at', 'desc')
            ->paginate(10);  
            
        return view('backend.demande_de_paiement.index', compact('demandePaiement'));
    }

    public function voirDemande($id)
    {
        $demandePaiement = HistoriqueRetrait::with('user', 'portefeuille', 'parametreRetrait')->findOrFail($id);

        return view('backend.demande_de_paiement.index', compact('demandePaiement'));
    }

    public function accepterRetrait($id)
    {   
        $demande = HistoriqueRetrait::find($id);

        // Vérifie si le retrait existe
        if (!$demande) {
            return redirect()->back()->with('error', 'Demande de retrait introuvable.');
        }

        // Vérifie si le retrait n'a pas déjà été traité
        if ($demande->status == 1) {
            return redirect()->back()->with('error', 'Ce retrait a déjà été effectué.');
        }

        // Effectuer le retrait et mettre à jour le statut à "accepté"
        $portefeuille = Portefeuille::where('user_id', $demande->user_id)->first();

        $portefeuille->solde -= $demande->montant;
        $portefeuille->solde_retire += $demande->montant;
        $portefeuille->save();

        $demande->status = 1;
        $demande->save();

        $demande->user->notify(new RetraitAccepteNotification($demande));  
        
        return redirect()->back()->with('success', 'Demande de retrait acceptée avec succès.');
    }

    public function voirVideo($id)
    {
        $video = Video::with('user')->findOrFail($id);

        return view('frontend.video.voir', compact('video'));
    }

    public function approuverVideo($id)
    {
        $video = Video::findOrFail($id);

        // Vérifiez si la vidéo a déjà été publiée (par exemple, en vérifiant un champ 'status')
        if ($video->status == 1) {
            return redirect()->back()->with('error', 'Cette vidéo a déjà été publiée.');
        }

        // Publiez la vidéo
        $video->status = 1;
        $video->save();

        // Envoyez la notification au partenaire
        $video->user->notify(new VideoPublishedNotification($video));

        return redirect()->back()->with('message', 'Vidéo publiée avec succès !');
    }
}
