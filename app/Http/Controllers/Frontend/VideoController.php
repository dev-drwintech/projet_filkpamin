<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\VideoCreditView;
use App\Models\Video;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Notifications\VideoReceivedNotification;
use App\Notifications\VideoPublishedNotification;
use App\Models\SearchQuery;
use App\Models\Portefeuille;
use App\Models\Role;
use App\Models\Payment;

class VideoController extends Controller
{
    // Afficher la liste des vidéos
    public function index()
    {
        $data['videos'] = Video::where('status', 1)
            ->select(['id', 'slug', 'title', 'type', 'genres', 'poster'])
            ->latest()
            ->paginate(18);
        return view('frontend.video.index', $data);
    }


    // crédité le partenaire en fonction de video visualiser
    public function partnerRevenue(Request $request)
    {

        try {

            $validated = $request->validate([
                'videoId' => 'required|uuid',
                'userId' => 'required|uuid',
            ]);
            Log::info("Données reçues : ", $request->all());

            $videoId = $validated['videoId'];
            $userId = $validated['userId'];
            Log::info("Début du processus pour la vidéo ID: $videoId et l'utilisateur ID: $userId");

            // Vérifie si l'utilisateur a déjà été crédité pour cette vidéo
            $existingView = VideoCreditView::where('video_id', $videoId)
                ->where('user_id', $userId)
                ->first();

            if ($existingView) {
                Log::info("Vue existante trouvée pour vidéo ID: $videoId et utilisateur ID: $userId, Crédité: " . ($existingView->credited ? 'Oui' : 'Non'));

                if ($existingView->credited) {
                    Log::info("Visionnage déjà crédité pour la vidéo ID: $videoId et utilisateur ID: $userId");
                    Log::info("Cool pour la plateforme pas de montant à payer à nouveau pour  cette vidéo ID: $videoId venant de l'utilisateur ID: $userId");
                    return response()->json(['message' => 'Visionnage déjà crédité.'], 200);
                }
            } else {
                Log::info("Aucune vue existante, création d'une nouvelle vue créditée.");

                // Créer un nouvel enregistrement pour la vidéo a crédité
                VideoCreditView::create([
                    'id' => Str::uuid(),
                    'video_id' => $videoId,
                    'user_id' => $userId,
                    'credited' => true,
                ]);

                Log::info("Nouvelle vue créée pour vidéo ID: $videoId et utilisateur ID: $userId");

                // Récupérer le rôle partenaire
                $partenaireRoleId = Role::where('nom', 'partenaire')->first()->id;
                Log::info("Rôle partenaire ID: $partenaireRoleId");

                // Vérifie si la vidéo appartient à un partenaire
                $video = Video::find($videoId);

                if (!$video) {
                    Log::error("Vidéo introuvable avec l'ID: $videoId");
                    return response()->json(['message' => 'Vidéo introuvable.'], 404);
                }

                $videoOwner = User::find($video->user_id);

                if ($videoOwner->role_id === $partenaireRoleId) {
                    Log::info("La vidéo appartient au partenaire, ID: {$videoOwner->id}");

                    // Récupération du portefeuille du partenaire
                    $portefeuille = Portefeuille::where('user_id', $videoOwner->id)->first();

                    if ($portefeuille) {
                        // créditer un montant au portefeuille
                        $montantCredit = 25;  // Montant à définir
                        $portefeuille->solde += $montantCredit;
                        $portefeuille->save();

                        Log::info("Portefeuille crédité de $montantCredit fcfa pour la video {$videoId} du partenaire ID: {$videoOwner->id}. Nouvelle balance: {$portefeuille->balance} ");
                    } else {
                        Log::warning("Aucun portefeuille trouvé pour le partenaire ID: {$videoOwner->id}");
                    }
                } else {
                    Log::info("Le propriétaire de la vidéo n'est pas un partenaire cool pour la plateforme pas de montant à payer à quelqu'un !");
                    return response()->json(["success" => true, "message" => "La video n'est pas pour un partenaire"]);
                }

                Log::info("Visionnage enregistré et revenu crédité pour vidéo ID: $videoId par vue de l'utilisateur ID: $userId");
                return response()->json(['message' => 'Visionnage enregistré et revenu crédité.'], 201);
            }
        } catch (\Exception $e) {
            Log::error("Erreur : " . $e->getMessage());
            return response()->json(['error' => 'Une erreur est survenue.'], 500);
        }
    }

    // Afficher les détails d'une vidéo
    public function show($slug)
    {
        $data['video'] = Video::where('slug', $slug)
            ->where('status', 1)
            ->with([
                'comments:id,user_id,video_id,comment_text,parent_id,created_at',
                'comments.replies:id,user_id,video_id,comment_text,parent_id,created_at',
                'reviews:id,user_id,video_id,title,body,rating,created_at',
                'comments.user:id,name,avatar',
                'comments.replies.user:id,name,avatar',
                'reviews.user:id,name,avatar',
                'comments.commentLikes:id,comment_id,user_id,status',
                'comments.replies.commentLikes:id,comment_id,user_id,status',
                'comments.commentDislikes:id,comment_id,user_id,status',
                'comments.replies.commentDislikes:id,comment_id,user_id,status'
            ])
            ->first();

        if ($data['video'] === null) {
            abort(404);
        }

        $data['video']->increment('views');

        $data['similarVideos'] = collect();
        $videos = Video::select(['id', 'slug', 'title', 'type', 'genres', 'poster', 'runtime', 'video', 'demo', 'views', 'photos'])
            ->where('status', 1)
            ->take(20)
            ->get();

        $genres = json_decode($data['video']['genres']);
        foreach ($videos as $video) {
            $videoGenres = json_decode($video['genres']);
            $isPushed = false;
            foreach ($genres as $i) {
                foreach ($videoGenres as $j) {
                    if (strcmp(trim(strtolower($i)), trim(strtolower($j))) == 0 && $video['id'] != $data['video']['id']) {
                        $data['similarVideos']->push($video);
                        $isPushed = true;
                        break;
                    }
                    if ($isPushed) {
                        break;
                    }
                }
                if ($isPushed) {
                    break;
                }
            }
        }

        // chargées tout les autres vidéos pour la lecture 
        $data['Autrescontenus'] = Video::where('status', 1)
            ->get();

        // recupérer les utilisateurs qui ont un abonnement
        $hasabonnement = Payment::where('user_id', Auth::user()->id)
            ->where('status', 'active')
            ->first();

        $data['hasabonnement'] = $hasabonnement;

        //dd($data);
        return view('frontend.video.show', $data);
    }

    // Afficher le formulaire de création d'une vidéo
    public function create()
    {
        return view('frontend.video.create');
    }

    // Enregistrer une nouvelle vidéo dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:videos',
            'type' => 'required|string|max:50',
            'genres' => 'required|string',
            'poster' => 'required|string',
            'status' => 'required|boolean',
        ]);

        Video::create([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'type' => $request->input('type'),
            'genres' => $request->input('genres'),
            'poster' => $request->input('poster'),
            'status' => $request->input('status'),
        ]);

        // Fermeture de la connexion après l'insertion de la vidéo
        DB::disconnect();
        return redirect()->route('frontend.video.index')->with('success', 'Vidéo créer avec succès.');
    }

    // Afficher le formulaire d'édition d'une vidéo existante
    public function edit($id)
    {
        $data['video'] = Video::findOrFail($id);
        return view('frontend.video.edit', $data);
    }

    // Mettre à jour une vidéo existante dans la base de données
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:videos,slug,' . $id,
            'type' => 'required|string|max:50',
            'genres' => 'required|string',
            'poster' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $video = Video::findOrFail($id);
        $video->update([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'type' => $request->input('type'),
            'genres' => $request->input('genres'),
            'poster' => $request->input('poster'),
            'status' => $request->input('status'),
        ]);
        // Fermeture de la connexion après l'insertion de la vidéo
        DB::disconnect();
        return redirect()->route('frontend.video.index')->with('success', 'Vidéo mise à jour avec succès.');
    }

    // Supprimer une vidéo existante
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();
        return redirect()->route('frontend.video.index')->with('success', 'Vidéo supprimé avec succès.');
    }

    // Autres 
    public function selectMovie()
    {
        return view('frontend.lastfront.selectMovie');
    }
    public function films()
    {
        $Toutfilms = Video::where('status', 1)
            ->where('type', 'Films')
            ->select('id', 'slug', 'title', 'type', 'genres', 'poster', 'year', 'views', 'directors', 'actors', 'status', 'country', 'runtime', 'photos', 'demo')
            ->get();


        // Récupérer les films de type 'Films' avec un statut actif
        $films = Video::where('status', 1)
            ->where('type', 'Films')
            ->get();

        DB::disconnect();

        return view('frontend.partials.films', compact('films', "Toutfilms"));
    }
    public function series()
    {
        $data['Toutseries'] = Video::where('status', 1)
            ->where('type', 'Serie')
            ->select('id', 'slug', 'title', 'type', 'genres', 'poster', 'year', 'views', 'directors', 'actors', 'status', 'country', 'runtime', 'photos', 'demo')
            ->get();

        $Series = Video::where('status', 1)
            ->where('type', 'Serie')
            ->get();

        $nouvelleserie = video::orderBy('created_at', 'desc')
            ->where('status', 1)
            ->where('type', 'Serie')
            ->take(30)
            ->get();

        DB::disconnect();
        return view('frontend.partials.series', compact('Series', 'data', 'nouvelleserie'));
    }
}
