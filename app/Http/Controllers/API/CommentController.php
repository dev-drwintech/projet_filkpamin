<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use App\Models\Video;
use App\Notifications\SomeoneReplied;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $video_id = $request->video_id;

        $comments = Comment::with([
            'user:id,name,avatar',
            'commentLikes:id,comment_id,user_id,status',
            'commentDislikes:id,comment_id,user_id,status',
            'replies.user:id,name,avatar',
            'replies.commentLikes:id,comment_id,user_id,status',
            'replies.commentDislikes:id,comment_id,user_id,status'
        ])
        ->select(['id', 'user_id', 'video_id', 'comment_text', 'parent_id', 'created_at'])
        ->withCount('replies', 'commentLikes', 'commentDislikes')
        ->where('video_id', $video_id)
        ->whereNull('parent_id')
        ->latest()
        ->paginate(20);

        return response()->json($comments);
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $user_id = auth()->user()->id;
            $video_id = $request->video_id;
            $parent_id = $request->parent_id;
            $comment_text = $request->comment_text;
            $replied_to_id = $request->replied_to_id;

            $this->validate($request, [
                'video_id' => 'required',
                'comment_text' => 'required|max:255',
                'parent_id' => 'sometimes',
                'replied_to_id' => 'sometimes'
            ]);

            $comment = Comment::create([
                'user_id' => $user_id,
                'video_id' => $video_id,
                'comment_text' => $comment_text,
                'parent_id' => $parent_id,
                'replied_to_id' => $replied_to_id
            ]);

            if (!empty($parent_id) && !empty($replied_to_id)) {
                $user = Comment::findOrFail($replied_to_id)->user_id;
                $toUser = User::findOrFail($user);
                $fromUser = User::findOrFail($user_id);
                $video = Video::findOrFail($video_id);
                $toUser->notify(new SomeoneReplied($fromUser, $comment, $video));
                $toUser->commentPushNotification($fromUser, $comment, $video);
            }

            return response()->json($comment, 201);
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), 500);
        }
    }

    public function show($id): JsonResponse
    {
        $replies = Comment::with([
            'user:id,name,avatar',
            'commentLikes:id,comment_id,user_id,status',
            'commentDislikes:id,comment_id,user_id,status'
        ])
        ->where('parent_id', '=', $id)
        ->select('id', 'user_id', 'video_id', 'comment_text', 'parent_id', 'created_at')
        ->latest()
        ->paginate(20);

        return response()->json($replies);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id): JsonResponse
    {
        try {
            $comment = Comment::findOrFail($id);
            if (auth()->user()->id == $comment->user_id) {
                $comment->delete();
                return response()->json(['message' => 'Commentaire supprimé.'], 200);
            }
            return response()->json(['message' => "Vous n'avez pas la permission de supprimer ce commentaire"], 403);
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), 500);
        }
    }
}

