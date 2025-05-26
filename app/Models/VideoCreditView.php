<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Video;
use App\Models\User;

class VideoCreditView extends Model
{
    use HasFactory;

    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'user_video_views';
    protected $fillable = [
        'id', // Ajoute l'id aux fillables
        'video_id',
        'user_id',
        'credited',
    ];

    // Relation avec Video
    public function video()
    {
        return $this->belongsTo(Video::class, 'video_id');
    }

    // Relation avec User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
