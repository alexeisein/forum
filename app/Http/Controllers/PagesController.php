<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use App\Category;

class PagesController extends Controller
{
	public function getAllQuestions()
	{
		$questions = Question::latest('created_at')->get();
		return view('pages.allquestions', compact('questions'));
	}

    public function getSingleQuestion($slug)
    {
    	$questions = Question::where('slug', '=', $slug)->first();
    	return view('pages.singlequestion', compact('questions'));
    }

}
