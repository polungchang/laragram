@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/update" enctype="multipart/form-data" method="post">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h2>{{ __('Edit Profile') }}</h2>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}</label>

                    <input id="name" 
                            type="text" 
                            class="form-control @error('name') is-invalid @enderror" 
                            name="name" 
                            value="{{ old('name') ?? $user->name }}" 
                            autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label">{{ __('Username') }}</label>

                    <input id="username" 
                            type="text" 
                            class="form-control @error('username') is-invalid @enderror" 
                            name="username" 
                            value="{{ old('username') ?? $user->username }}" 
                            autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="website" class="col-md-4 col-form-label">{{ __('Website') }}</label>

                    <input id="website" 
                            type="text" 
                            class="form-control @error('website') is-invalid @enderror" 
                            name="website" 
                            value="{{ old('website') ?? $user->profile->website }}" 
                            autocomplete="website" autofocus>

                    @error('website')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="bio" class="col-md-4 col-form-label">{{ __('Bio') }}</label>

                    <input id="bio" 
                            type="text" 
                            class="form-control @error('bio') is-invalid @enderror" 
                            name="bio" 
                            value="{{ old('bio') ?? $user->profile->bio }}" 
                            autocomplete="bio" autofocus>

                    @error('bio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label">{{ __('Avatar') }}</label>
                    <input type="file" class="form-control-file" name="image" id="image">

                    @error('image')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="form-group row pt-3">
                    <button type="submit" class="btn btn-primary">Save Profile</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
