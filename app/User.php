<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot() /** cada vez que se cree un usuario nuevo, se disparara esta funcion */
    {
        parent::boot();

        static::created(function ($user){
            $user->profile()->create([
                'title' => $user->username,
            ]);
        });
    }

    public function profile()
    {
        return $this->HasOne(Profile::class)->orderBy('created_at', 'DESC');
    }
    public function following()
    {
        return $this->belongsToMany(Profile::class);
    }
    public function posts()
    {
        return $this->HasMany(Post::class);
    }
}
