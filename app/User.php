<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
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
        'fullname', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

/*Relationship USER-QUESTION*/
    public function questions()
    {
        return $this->hasMany('App\Question');
    }

/*Relationship USER-REPLIES*/
    public function replies()
    {
        return $this->hasMany('App\Reply');
    }


/*Accessors*/
    public function getFullnameAttribute($value)
    {
        return ucwords($value);
    }

    public function getUsernameAttribute($value)
    {
        return ucwords($value);
    }
/* Mutators*/
    public function setFullnameAttribute($value)
    {
       return $this->attributes['fullname'] = strtolower($value);
    }

    public function setUsernameAttribute($value)
    {
       return $this->attributes['username'] = strtolower($value);
    }

    public function setEmailAttribute($value)
    {
       return $this->attributes['email'] = strtolower($value);
    }

    public function userId()
    {
        return Auth::user()->id;
    }
}
