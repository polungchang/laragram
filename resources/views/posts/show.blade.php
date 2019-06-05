@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <img src="/storage/{{ $post->image }}" alt="" class="w-100">
        </div>
        <div class="col-md-4">
            <div>
                <div class="row">
                    <div class="col-2">
                        <img src="{{ $post->user->profile->image }}" alt="" class="w-100 rounded-circle">
                    </div>
                    <div class="col-10 d-flex">
                        <div class="font-weight-bold">
                            <a href="/{{ $post->user->username }}" style="color: #000000; text-decoration: none;">{{ $post->user->username }}</a>
                        </div>
                        <div class="ml-2 mr-2">•</div>
                        <div class="font-weight-bold">
                            <a href="#">Follow</a>
                        </div>
                    </div>
                </div>

                <hr>

                <p>
                    <span class="font-weight-bold">
                        <a href="/{{ $post->user->username }}" style="color: #000000; text-decoration: none;">{{ $post->user->username }}</a>
                    </span>  {{ $post->caption }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
