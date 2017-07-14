<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
    	'body',
    ];

/*Relationship QUESTION-REPLY*/
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

/*Relationship USER-REPLY*/
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
