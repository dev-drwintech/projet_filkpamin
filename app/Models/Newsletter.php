<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    // Spécifie le nom de la table si différent du nom du modèle
    protected $table = 'newsletters';

    // Les champs qui peuvent être remplis en masse
    protected $fillable = [
        'id',
        'email',
    ];

    // Indique que la clé primaire n'est pas un entier auto-incrémenté
    public $incrementing = false;
    protected $keyType = 'string';

    // Génère un UUID lors de la création d'un nouvel enregistrement
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) \Illuminate\Support\Str::uuid();
            }
        });
    }
}
