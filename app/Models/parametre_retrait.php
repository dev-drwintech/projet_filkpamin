<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class parametre_retrait extends Model
{
    use HasFactory;

    protected $fillable = ['details', 'type_de_paiement', 'user_id'];
    public $incrementing = false; // Désactive l'auto-incrémentation
    protected $keyType = 'string'; // Définit la clé primaire comme chaîne

    protected static function boot()
    {
        parent::boot();

        // Assigne un UUID automatiquement si 'id' est vide lors de la création
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

