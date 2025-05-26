<?php

namespace App\Http\Controllers;

use App\Models\User; // Assurez-vous d'importer le modèle User
use App\Notifications\NotifyInactiveUser; // Importez votre notification
use App\Notifications\TestNotification; // Importez la nouvelle notification
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'Utilisateur non authentifié.'], 401);
        }

        // Récupérer les notifications de la base de données
        $notifications = $user->notifications()->get(); // Plus besoin d'utiliser orderBy ici

        // Retourner les notifications sous forme de JSON
        return response()->json($notifications);
    }

    public function sendNotification($userId)
    {
        $user = User::find($userId); // Remplacez $userId par l'ID de l'utilisateur ciblé

        if ($user) {
            // Envoyer la notification
            $user->notify(new NotifyInactiveUser());

            return response()->json(['message' => 'Notification envoyée avec succès.']);
        }

        return response()->json(['error' => 'Utilisateur non trouvé.'], 404);
    }

    public function sendTestNotification()
    {
        $user = User::find(1); // Remplace "1" par l'ID d'un utilisateur existant
        if ($user) {
            $user->notify(new TestNotification());
            return response()->json(['message' => 'Notification envoyée avec succès.']);
        }
        
        return response()->json(['error' => 'Utilisateur non trouvé.'], 404);
    }

    // Méthode unique pour marquer les notifications comme lues
    public function markAsRead(Request $request)
    {
        $user = auth()->user();
        
        if ($user) {
            // Marquer toutes les notifications non lues comme lues
            $user->unreadNotifications->markAsRead();
        }

        return response()->json(['status' => 'success']);
    }
}
