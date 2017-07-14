<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;

class UserProfileController extends Controller
{
    public function allUsers()
    {
        $users = User::latest('created_at')->get();
        return view('pages.all_users', compact('users'));
    }

    public function viewUser()
    {
        $questions = Question::all();
        return view('pages.view_user', compact('questions'));
    }

	public function dashboard()
    {
    	return view('user.dashboard');
    }

    public function profile()
    {
    	return view('user.profile');
    }

    public function settings()
    {
    	return view('user.settings');
    }
}
