<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriqueRetrait extends Model
{
    use HasFactory;

    protected $table = 'historique_retraits';

    protected $fillable = [
        'portefeuille_id',
        'user_id',
        'parametre_retraits_id',
        'montant',
        'status',
    ];

    public $incrementing = false; // Désactive l'auto-incrémentation
    protected $keyType = 'string'; 

    // Relation avec le modèle Portefeuille
    public function portefeuille()
    {
        return $this->belongsTo(Portefeuille::class);
    }

    // Relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relation avec le modèle parametreRetrait
    public function parametreRetrait()
    {
        return $this->belongsTo(parametre_retrait::class, 'parametre_retraits_id');
    }

}
