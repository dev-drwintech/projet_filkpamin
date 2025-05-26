<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Portefeuille extends Model // Renommez à Portefeuille
{
    use HasFactory, Notifiable, UUID;

    // Liste des champs pouvant être massivement assignés
    protected $fillable = [
        'user_id',
        'solde',
        'solde_retire',
        'status',
    ];

    // Relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function historique()
    {
        return $this->hasMany(HistoriqueRetrait::class);
    }
}
