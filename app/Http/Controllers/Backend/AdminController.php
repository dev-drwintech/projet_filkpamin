<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Review;
use App\Models\User;
use App\Models\Video;

class AdminController extends Controller
{
    public function index()
    {
        // views count
        $views = Video::select('views')
            ->take(5)
            ->get();

        $viewsThisMonth = 0;

        foreach ($views as $view) {
            $viewsThisMonth += $view->views;
        }

        // items added this month
        $itemsAddedThisMonth = Video::where('created_at', '<', now()->addMonth())
            ->count('id');

        // new comments this week
        $newComments = Comment::where('created_at', '<', now()->addWeek())
            ->count('id');

        // new reviews this week
        $newReviews = Review::where('created_at', '<', now()->addWeek())
            ->count('id');

        // top videos
        $topVideos = Video::select('id', 'slug', 'title', 'type')
            ->latest('views')
            ->take(5)
            ->get();

        // latest videos
        $latestVideos = Video::select('id', 'slug', 'title', 'type', 'status')
            ->where('status', 1)
            ->latest()
            ->take(5)
            ->get();

        // latest users
        $latestUsers = User::whereNotNull('last_login_at')
            ->select('id', 'name', 'email', 'last_login_at')
            ->latest()
            ->take(5)
            ->get();

        // latest reviews
        $latestReviews = Review::with('user:id,name,avatar')
            ->select('id', 'user_id', 'title', 'rating')
            ->latest()
            ->take(5)
            ->get();

        //Notification
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        // Récupérer l'admin connecté et ses notifications non lues
        $notifications = $user->unreadNotifications;
        $unreadCount = $notifications->where('read_at', null)->count();


        return view('backend.admin', compact('viewsThisMonth', 'itemsAddedThisMonth', 'newComments', 'newReviews', 'topVideos', 'latestVideos', 'latestUsers', 'latestReviews', 'notifications', 'unreadCount'));
    }
}