<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'video_id' => 'required',
            'title' => 'required|max:50',
            'body' => 'required',
            'rating' => 'required'
        ]);

        $userId = auth()->id();
        $videoId = $request->video_id;

        $review = Review::where('user_id', $userId)->where('video_id', $videoId)->first();

        try {
            if (!$review) {
                auth()->user()->reviews()->create($validated);
                session()->flash('message', 'Remarque ajouté');
                session()->flash('type', 'success');
                return back();
            }
            session()->flash('message', "Vous pouvez pas donner deux fois une remarque supprimé l'ancien et donner à nouveau.");
            session()->flash('type', 'danger');
            return back();
        } catch (\Exception $exception) {
            session()->flash('message', $exception->getMessage());
            session()->flash('type', 'danger');
            return back();
        }
        // Fermeture de la connexion après l'insertion de la vidéo
        DB::disconnect();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        try {
            if (auth()->user()->id == Review::findOrFail($id)->user_id) {
                $review = Review::findOrFail($id);
                $review->delete();

                session()->flash('message', 'Remarque supprimé');
                session()->flash('type', 'success');
                return redirect()->back();
            }

            session()->flash('message', "Vous n'avez pas l'autorisation de supprimé cette remarque.");
            session()->flash('type', 'danger');
            return redirect()->back();
        } catch (\Exception $exception) {
            session()->flash('message', $exception->getMessage());
            session()->flash('type', 'danger');
            return redirect()->back();
        }
    }
}
