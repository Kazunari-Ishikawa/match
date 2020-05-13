<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\PasswordResetNotification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','icon','profile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $visible = [
        'name', 'icon', 'profile'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * モデルのデフォルト値
     *
     * @var array
     */
    protected $attributes = [
        'name' => '名無しさん',
    ];

    public function works()
    {
        return $this->hasMany('App\Work');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function requestedBoards()
    {
        return $this->hasMany('App\Board', 'to_user_id', 'id');
    }

    public function appliedBoards()
    {
        return $this->hasMany('App\Board', 'from_user_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function applies()
    {
        return $this->hasMany('App\Apply');
    }

    public function bookmarks()
    {
        return $this->hasMany('App\Bookmark');
    }
    /**
     * パスワードリセット通知の送信
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token));
    }

}
