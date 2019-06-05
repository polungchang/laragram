<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $user = auth()->user();

        $followingIds = $user->followings()->pluck('users.id')->all();

        array_push($followingIds, $user->id);

        $posts = Post::whereIn('user_id', $followingIds)
                     ->with('user.profile')
                     ->orderBy('created_at', 'DESC')
                     ->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/' . auth()->user()->username);
    }

    public function show($post)
    {
        $post = \App\Post::findOrFail($post);
        
        return view('posts.show', compact('post'));
    }
}
