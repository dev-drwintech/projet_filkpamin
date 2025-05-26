<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notification;

class NotificationController extends Controller
{
    public function index()
    {   
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        $data['notifications'] = $user->notifications()->paginate(20);

        return view('frontend.notification.index', $data);
    }

    public function markAsRead($id)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        $notification = $user->notifications()->findOrFail($id);

        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->back();
    }

}