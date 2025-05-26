<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory, UUID;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nom',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }
    // Ajoutez ceci à votre modèle Role
    public static function getAdminRoleId()
    {
        // Remplacez 'admin' par le nom exact de votre rôle administrateur
        return self::where('nom', 'admin')->first()->id;
    }

}
