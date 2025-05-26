<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Support\Str;
use App\Events\VideoCreated;
use App\Events\VideoDeleted;
use App\Events\VideoUpdated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Client\RequestException;

class Video extends Model
{
    use HasFactory, UUID;

    protected $appends = [

        'poster_url',
        'photo_urls',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'slug',
        'description',
        'runtime',
        'year',
        'genres',
        'country',
        'directors',
        'actors',
        'poster',
        'video',
        'type',
        'photos',
        'demo',
        'likes',
        'dislikes',
        'status',
    ];


    /*
     * Create slug automatically when video title given
     */

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($video) {
            $video->slug = Str::slug($video->title . '-' . $video->year);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)
            ->latest()
            ->whereNull('parent_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class)
            ->latest()
            ->where('parent_id');
    }

    public function videoLikes()
    {
        return $this->hasMany(VideoLike::class)->where('status', 1);
    }

    public function videoDislikes()
    {
        return $this->hasMany(VideoLike::class)->where('status', 0);
    }

    public function isLikedBy(User $user)
    {
        return (bool)$user->videoLikes()
            ->where('video_id', $this->id)
            ->where('status', 1)
            ->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool)$user->videoLikes()
            ->where('video_id', $this->id)
            ->whereNotNull('status')
            ->where('status', 0)
            ->count();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * The event map for the model.
     *
     * Allows for object-based events for native Eloquent events.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => VideoCreated::class,
        'updated' => VideoUpdated::class,
        'deleted' => VideoDeleted::class,
    ];

    public function getPosterUrlAttribute()
    {
        return asset('storage/' . $this->video);
    }

    public function getPhotoUrlsAttribute()
    {
        $photoUrls = [];

        if ($this->videos) {
            $videos = json_decode($this->video);

            foreach ($videos as $video) {
                // Utilisez asset() pour générer le chemin complet vers la video
                $photoUrls[] = asset('storage/' . $video);
            }
        }

        return $photoUrls;
    }
    
}
