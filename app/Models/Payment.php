<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Importer la classe Str pour la génération d'UUID

class Payment extends Model
{
    protected $primaryKey = 'id'; // Définir la clé primaire
    public $incrementing = false; // Indiquer que la clé primaire n'est pas auto-incrémentée

    protected $fillable = ['id', 'user_id', 'amount', 'transaction_id', 'PlanAbonnement', 'status','method', 'renouvellement_date', 'expire_date'];

    // Méthode pour générer un UUID lors de la création d'un nouvel enregistrement
    protected static function boot()
    {
        parent::boot();

        // Écouteur pour générer un UUID avant de créer un nouvel enregistrement
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid(); // Utilisation de Str::uuid() pour générer un UUID
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
