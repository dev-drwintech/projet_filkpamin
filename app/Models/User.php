<?php

namespace App\Models;

use App\Traits\UUID;
use GuzzleHttp\Client;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Portefeuille;
use App\Models\parametre_retrait;
use App\Notifications\EmailVerifiedNotification;


class User extends Authenticatable implements JWTSubject, MustVerifyEmail
{
    use HasFactory, SoftDeletes, HasApiTokens, UUID, Notifiable;
    use Notifiable; // Assurez-vous que ce trait est inclus
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'provider_id',
        'avatar',
        'password',
        'auth',
        'role_id',
        'email_verified_at',
        'fcm_token',
        'last_login_at',
        'last_login_ip',
        'is_blocked',
    ];

    // Event listener qui se déclenche lors de la création d'un utilisateur
    protected static function booted()
    {
        static::created(function ($user) {
            // On vérifie si l'utilisateur a le rôle "partenaire"
            if ($user->role->nom === 'partenaire') {
                // Création du portefeuille pour cet utilisateur
                Portefeuille::create([
                    'user_id' => $user->id,
                    'solde' => 0.00,
                    'solde_retire' => 0.00,
                ]);
            }
        });
    }

    // Relation avec le portefeuille (un utilisateur a un portefeuille)
    public function portefeuille()
    {
        return $this->hasOne(Portefeuille::class);
    }


    public function isAdmin()
    {
        // Récupère le rôle d'administrateur par son nom
        $adminRole = Role::where('nom', 'admin')->first();

        // Vérifie si l'utilisateur a le rôle d'administrateur
        return $this->role_id === $adminRole->id;
    }

    // Relation avec la table les utilisateurs ajoutent les infos de retrait
    public function parametre_retrait() 
    {
        return $this->hasOne(parametre_retrait::class, 'user_id');
    }
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'google2fa_secret', //Add By Akinoche Mohamed
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
    ];

    /**
     * JWT Token
     */

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
    public function historique()
    {
        return $this->hasMany(HistoriqueRetrait::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function videoLikes()
    {
        return $this->hasMany(VideoLike::class);
    }

    public function commentLikes()
    {
        return $this->hasMany(CommentLike::class);
    }

    public function commentDislikes()
    {
        return $this->hasMany(CommentLike::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'user_id', 'id');
    }

    public function topicPushNotification($to, $title, $body, $video_id, $poster)
    {
        $data['to'] = '/topics/' . $to;
        $data['notification']['title'] = $title;
        $data['notification']['body'] = $body;
        $data['data']['video_id'] = $video_id;
        $data['data']['poster'] = $poster;

        $http = new Client(['headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'key=' . config('services.fcm.server_key')
        ]]);
        try {
            $response = $http->post('https://fcm.googleapis.com/fcm/send', [
                'json' => $data
            ]);
            return $response->getBody();
        } catch (GuzzleException $e) {
            return $e;
        }
    }

    public function commentPushNotification($fromUser, $comment, $video)
    {
        $to = $this->fcm_token;

        if (!empty($to)) {
            $data['to'] = $to;
            $data['notification']['title'] = $fromUser->name . ' replied to your comment';
            $data['notification']['body'] = 'on "' . $video->title . '" ' . str_replace('@' . $this->name, "", $comment->comment_text);
            $data['notification']['click_action'] = "FLUTTER_NOTIFICATION_CLICK";
            $data['data']['sound'] = "default";
            $data['data']['status'] = "done";
            $data['data']['screen'] = "/single_video";
            $data['data']['video_id'] = $video->id;
            $data['data']['poster'] = 'https://image.tmdb.org/t/p/w45/' . $video->poster;

            $http = new Client(['headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'key=' . config('services.fcm.server_key')
            ]]);
            try {
                $response = $http->post('https://fcm.googleapis.com/fcm/send', [
                    'json' => $data
                ]);
                return $response->getBody();
            } catch (GuzzleException $e) {
                return $e;
            }
        }

        return 0;
    }

    public function markEmailAsVerified()
    {
        if ($this->hasVerifiedEmail()) {
            return false;
        }

        $this->forceFill([
            'email_verified_at' => now(),
        ])->save();

        // Envoyer la notification après la vérification de l'email
        $this->notify(new EmailVerifiedNotification());

        return true;
    }
}
