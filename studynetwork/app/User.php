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
        'name', 'email', 'password','about'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
     public function isAdmin()
    {
      return $this->role === 'admin';
    }
      public function isTeacher()
    {
      return $this->role === 'teacher';
    }
     public function posts()
    {
      return $this->hasMany(Post::class);
    }
    public function replies()
    {
      return $this->hasMany(Reply::class);
    }
    public function courseapproval()
     {
        return $this->hasMany(courseApproval::class);
     }
}
