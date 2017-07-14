<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Category extends Model
{
    protected $fillable = [
    	'name',
    ];

    // protected $date = [
    //     'created_at',
    //     'updated_at',
    // ];

/*relationship QUESTION-CATEGORY*/
    public function questions()
    {
        return $this->hasMany('App\Question');
    }



/*Accessors*/
    public function getNameAttribute($value)
    {
    	return ucwords($value);
    }

/* Mutators*/
    public function setNameAttribute($value)
    {
    	return $this->attributes['name'] = strtolower($value);
    }

}
