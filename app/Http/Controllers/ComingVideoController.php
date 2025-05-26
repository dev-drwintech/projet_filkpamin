<?php

namespace App\Http\Controllers;

use App\Models\coming_videos;
use Illuminate\Http\Request;

class ComingVideoController extends Controller
{
    /**
     * Affiche la liste des vidéos à venir.
     */
    public function index()
    {
        $comingVideos = coming_videos::all();
        return view('coming-videos.index', compact('comingVideos'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle vidéo.
     */
    public function create()
    {
        //return view('coming-videos.create');
    }

    /**
     * Stocke une nouvelle vidéo dans la base de données.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|string|max:50',
            'genres' => 'required|array',
            'genres.*' => 'string|max:50',
            'description' => 'required|string',
            'image' => 'required|string|max:255',
        ]);

        coming_videos::create($validated);

        return redirect()->route('coming-videos.index')
            ->with('success', 'Vidéo ajoutée avec succès.');
    }

    /**
     * Affiche une vidéo spécifique.
     */
    public function show(coming_videos $comingVideo)
    {
        // return view('coming-videos.show', compact('comingVideo'));
    }

    /**
     * Affiche le formulaire d'édition d'une vidéo.
     */
    public function edit(coming_videos $comingVideo)
    {
        //  return view('coming-videos.edit', compact('comingVideo'));
    }

    /**
     * Met à jour une vidéo dans la base de données.
     */
    public function update(Request $request, coming_videos $comingVideo)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|string|max:50',
            'genres' => 'required|array',
            'genres.*' => 'string|max:50',
            'description' => 'required|string',
            'image' => 'required|string|max:255',
        ]);

        //   $comingVideo->update($validated);

        //  return redirect()->route('coming-videos.index')
        //      ->with('success', 'Vidéo mise à jour avec succès.');
    }

    /**
     * Supprime une vidéo de la base de données.
     */
    public function destroy(coming_videos $comingVideo)
    {
        //  $comingVideo->delete();

        //  return redirect()->route('coming-videos.index')
        //      ->with('success', 'Vidéo supprimée avec succès.');
    }
}
