<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    // Si vous avez des champs que vous souhaitez remplir, listez-les ici
    protected $fillable = [
        'title', // ou tout autre champ que vous avez dans votre table notifications
        'message',
        'user_id', // Assurez-vous d'ajouter des champs selon votre besoin
    ];
}
