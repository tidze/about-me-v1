@extends('layouts.app')
@section('title','User | Update Posts')
@section('content')
<body>
    <div class="container">
        <div class="row">
            <div class="offset-md-4 col-md-4 mt-4">
                <form action="{{ route('user.post.update', ['user_id' => Auth::user()->id,'post_id'=>$post->id]) }}" method="post">
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif

                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @csrf
                    <h4>Update Post</h4>
                    <hr>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                        @error('title')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <textarea type="text" class="form-control" name="body" rows="5" >
                            {{ $post->body }}
                        </textarea>
                        @error('body')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
                </form>
            </div>
            <div class="offset-md-4 col-md-4 mt-4">
                <x-back-to-homepage text="Back To Profile" :userId="Auth::user()->id" routeName="user.home" />
                    <x-back-to-homepage text="Back To Homepage" :userId="Auth::user()->id" routeName="home" />
            </div>
        </div>
    </div>
    @livewireScripts
</body>
@endsection