<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\SearchQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        $video = Video::where('status', 1)
            ->where('title', 'LIKE', '%' . $query . '%')
            ->first();

        // Enregistrer la recherche avec l'ID de la vidéo si elle existe
        if ($query) {
            $video = Video::where('title', 'like', '%' . $query . '%')->first(); // Récupérer la vidéo correspondante

            SearchQuery::create([
                'query' => $query,
                'video_id' => $video ? $video->id : null, // Associer l'ID vidéo si trouvé
            ]);
        }

        $data['query'] = $query;

        $data['results'] = Video::where('status', 1)
            ->where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('genres', 'LIKE', '%' . $query . '%')
            ->orWhere('country', 'LIKE', '%' . $query . '%')
            ->orWhere('directors', 'LIKE', '%' . $query . '%')
            ->orWhere('actors', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', '%' . $query . '%')
            ->orWhere('type', 'LIKE', '%' . $query . '%')
            ->orWhere('runtime', 'LIKE', '%' . $query . '%')
            ->orWhere('year', 'LIKE', '%' . $query . '%')
            ->select('id', 'slug', 'title', 'views', 'runtime', 'year', 'type', 'genres', 'country', 'directors', 'description', 'actors', 'demo', 'photos', 'poster', 'runtime')
            ->orderByDesc('views')
            ->paginate(18)
            ->withQueryString();

        // Récupérer les recherches populaires
        $topSearches = SearchQuery::select('query')
            ->groupBy('query')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(10)
            ->pluck('query');

        $data['topSearches'] = $topSearches;

        $data['videos'] = cache('videos', function () {
            return Video::where('status', 1)
                ->select('id', 'slug', 'title', 'type', 'genres', 'poster', 'year', 'views', 'directors', 'actors', 'status', 'demo', 'country', 'runtime', 'photos')
                ->get();
        });

        DB::disconnect();

        return view('frontend.search.index', $data);
    }
}
