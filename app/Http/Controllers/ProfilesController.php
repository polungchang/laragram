<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show($username)
    {
        $user = \App\User::whereUsername($username)->firstOrFail();

        $isFollowing = auth()->user() ? auth()->user()->followings->contains($user->id) : false;

        return view('profiles.index', compact('user', 'isFollowing'));
    }

    public function edit()
    {
        $user = auth()->user();

        return view('profiles.edit', compact('user'));
    }

    public function update()
    {
        $user = auth()->user();

        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'bio' => ['max:255'],
            'website' => ['max:255'],
            'image' => '',
        ]);

        // dd($user->id);

        $userData = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => [
                'required', 
                'string', 
                'max:255', 
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('uploads', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
            $image->save();

            $data['image'] = $imagePath;
        }

        // work with database
        auth()->user()->update($userData);

        auth()->user()->profile()->update($data);

        return redirect('/' . auth()->user()->username);
    }
}
