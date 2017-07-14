<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reply;
use App\Question;
use App\User;
use Crypt;
use Purifier;

class RepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                'body' => 'required|max:2000',
            ]);

        $replies = new Reply;
        $replies->body = Purifier::clean($request['body']);
        $replies->user_id = Auth::user()->id;
        $replies->question_id = Crypt::decrypt($request['question_id']);

        $replies->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $replies = Reply::findOrFail($id);
        return view('pages.show', compact('replies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $replies = Reply::findOrFail($id);
        return view('pages.edit_reply', compact('replies'));
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
        $this->validate($request,[
                'body' => 'required|max:2000',
            ]);

        $replies = Reply::findOrFail($id);
        $replies->update($request->all());
        return redirect()->route('posts.single', $replies->question->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $replies = Reply::findOrFail($id);
        $replies->delete();
        return redirect()->route('posts.single', $replies->question->slug);
    }
}
