<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
class tracking_paiement extends Model
{
    use HasFactory;


    public $incrementing = false; // Important pour les UUID
    protected $keyType = 'string'; // Sinon Laravel croit que c’est un int

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    protected $fillable = [
        'track_id',
        'user_id',
        'status',
        'payment_method',
        'amount',
        'plan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
