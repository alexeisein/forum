<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Question;
use App\User;
use App\Reply;
use Illuminate\Support\Facades\Auth;
use Purifier;

class QuestionsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryId = Category::pluck('name', 'id');
        $questions = Question::latest('created_at')->get();
        return view('question.index', compact(['categoryId', 'questions']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[ 
            'title' => 'required|max:255',
            'slug' => 'required|unique:questions,slug|min:5|max:255',
            'body' => 'required|max:7000',
            ]);

        $questions = new Question;

        $questions->title = $request['title'];
        $questions->category_id = $request['category_id'];
        $questions->user_id = Auth::user()->id;
        $questions->slug = $request['slug'];
        $questions->body = Purifier::clean($request['body']);
        $questions->save();

        session()->flash('success', 'Your question has been posted');
        return redirect()->route('questions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $questions = Question::findOrFail($id);
        // return view('question.show', compact(['questions','replies']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questions = Question::findOrFail($id);
        $categoryId = Category::pluck('name', 'id');
        return view('question.edit', compact(['questions', 'categoryId']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
// Do validation for slug
        $questions = Question::findOrFail($id);

        if ($request->input('slug') == $questions->slug) {
            $this->validate($request, [
                'title' => 'required|max:255',
                'body' => 'required|max:2000',
            ]);
        }else{
            $this->validate($request, [
                'title' => 'required|max:255',
                'slug' => 'required|unique:questions,slug|min:5|max:255',
                'body' => 'required|max:2000',
            ]);
        }
        
// Save into the databasee
        $questions->title = $request['title'];
        $questions->category_id = $request['category_id'];
        $questions->slug = $request['slug'];
        $questions->body = Purifier::clean($request['body']);
        $questions->save();

        //$questions->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questions = Question::findOrFail($id);
        $questions->delete();
        return redirect()->route('questions.index');
    }
}
