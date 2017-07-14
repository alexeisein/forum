<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Question;


class Question extends Model
{

/*For Mass Assignment*/
    protected $fillable = [
    	'title',
    	'category_id',
    	'slug',
    	'body',
    ];

/*Relationship USER-QUESTION*/
    public function user()
    {
        return $this->belongsTo('App\User');
    }

/*Relationship QUESTION-REPLY*/
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

/*Declare relationships QUESTION-CATEGORY*/
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    
/*Accessors*/
	//for title
	public function getTitleAttribute($title)
	{
		return ucfirst(htmlspecialchars($title));
	}

/*Mutators*/
	public function setTitleAttribute($title)
	{
		$this->attributes['title'] = strtolower($title);
		return $this->attributes['title'] = str_replace(str_split('|*\\/<>.'), ' ', $title);
	}

	public function setBodyAttribute($body)
	{
		return $this->attributes['body'] = strtolower($body);
	}


	public function setSlugAttribute($slug)
	{

		return $this->attributes['slug'] = str_replace(' ', '-', $this->attributes['title']);
		 
	}

}
