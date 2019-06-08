@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->image }}" 
                class="rounded-circle w-100"
                alt="">
        </div>
        <div class="col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center">
                    <h4>{{ $user->name }}</h4>
                    @cannot('update', $user->profile)
                        <follow-component user-id="{{ $user->id }}" is-following="{{ $isFollowing }}"></follow-component>
                    @endcannot
                </div>
                @can('update', $user->profile)
                    <a href="/p/create">{{ __('Create Post') }}</a>
                @endcan
            </div>

            @can('update', $user->profile)
                <a href="/profile/edit">{{ __('Edit Profile') }}</a>
            @endcan

            <div class="d-flex pt-3">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> {{ __('posts') }}</div>
                <div class="pr-5"><strong>{{ $user->followers->count() }}</strong> {{ __('followers') }}</div>
                <div class="pr-5"><strong>{{ $user->followings->count() }}</strong> {{ __('following') }}</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->username }}</div>
            <div>{{ $user->profile->bio }}</div>
            <div><a href="{{ $user->profile->getWebsiteHref() }}">{{ $user->profile->website }}</a></div>
        </div>
    </div>

    <div class="row pt-4">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100" alt="">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
