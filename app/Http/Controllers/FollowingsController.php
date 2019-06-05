<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function follow($user)
    {
        $user = User::findOrFail($user);

        auth()->user()->add_following($user);

        return "{$user->username} followed";
    }

    public function unfollow($user)
    {
        $user = User::findOrFail($user);

        auth()->user()->remove_following($user);

        return "{$user->username} unfollowed";
    }
}
