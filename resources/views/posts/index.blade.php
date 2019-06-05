@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if(count($posts) <= 0)
                <div class="h1">no posts</div>
            @endif
            @foreach($posts as $post)
                <div class="row">

                    <div class="col-2">
                        <a href="/{{ $post->user->username }}" style="color: #000000; text-decoration: none;">
                            <img src="{{ $post->user->profile->image }}" alt="" class="w-100 rounded-circle">
                        </a>
                    </div>

                    <div class="col-10 font-weight-bold">
                        <a href="/{{ $post->user->username }}" style="color: #000000; text-decoration: none;">
                            {{ $post->user->username }}
                        </a>
                    </div>

                    <div>{{ $post->created_at->diffForHumans() }}</div>
                </div>

                <div class="row">
                    <div class="pb-1">
                        <a href="/p/{{ $post->id }}">
                            <img src="/storage/{{ $post->image }}" class="w-100" alt="">
                        </a>
                    </div>
                </div>

                <div class="row pb-4">
                    <p>
                        <span class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}" style="color: #000000; text-decoration: none;">{{ $post->user->username }}</a>
                        </span>  {{ $post->caption }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
