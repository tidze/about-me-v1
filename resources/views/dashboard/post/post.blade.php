@extends('layouts.app')
@section('title', 'User | Posts')
@section('content')
    <style>
    </style>

    <body>
        {{-- @dd($userId) --}}
        @auth
            <div class="container pt-2">
                <div class="row">
                    <div class="col-md-4 offset-md-4">
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
                    </div>
                </div>

                @can('user-check-alpha', (int) $userId)
                    <div class="row">
                        <div class="offset-md-4 col-md-4 mt-4">
                            <form action="{{ route('user.post.create', ['user_id' => Auth::user()->id]) }}" method="post"
                                enctype="multipart/form-data">

                                @csrf
                                <h4>Make a New Post</h4>
                                <hr>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title">
                                    @error('title')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="body" class="form-label">Body</label>
                                    <textarea type="text" class="form-control" name="body" rows="1"></textarea>
                                    @error('body')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary" type="submit">Create</button>
                            </form>

                        </div>

                    </div>
                @endcan

                <div class="row">
                    <div class="col-md-4 offset-md-4 mt-4">
                        {{-- @dd($user_id) --}}
                        @include('components.dashboard')
                        @include('components.homepage')
                        @include('components.posts')
                        {{-- <x-back-to-homepage text="Back To Profile" :userId="Auth::user()->id" routeName="user.home" /> --}}
                        {{-- <x-back-to-homepage text="Back To Homepage" :userId="Auth::user()->id" routeName="home" /> --}}
                        {{-- <x-buttons.dashboard :userId="Auth::user()->id"/> --}}
                        {{-- <x-buttons.homepage :userId="Auth::user()->id"/> --}}
                        {{-- <x-buttons.posts :userId="Auth::user()->id"/> --}}
                        {{-- @livewire('back-to-homepage', --}}
                        {{-- ['user_id'=>Auth::user()->id,'text'=>'Back To Profile','route_name'=>'user.home']) --}}
                        {{-- @livewire('back-to-homepage', --}}
                        {{-- ['user_id'=>Auth::user()->id,'text'=>'Back To Homepage','route_name'=>'home']) --}}
                    </div>
                </div>
            </div>
        @endauth
        {{-- fetch the user's post from database --}}

        <div class="container d-flex justify-content-start align-items-center my-5">
            @forelse ($posts as $post)
                <div class="card m-2" style="width: 18rem;">
                    <img src="{{ URL::to('framework/public/images/'.$post->image_path) }}" class="card-img-top" alt="...">
                    <div class="card-body pt-3 pb-1">
                        <h4 class="text-break">{{ $post->title }}</h4>
                        <h5 class="text-break">{{ $post->body }}</h5>
                        <h6>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</h6>
                        <h6>{{ \Carbon\Carbon::parse($post->created_at) }}</h6>
                    </div>
                    <div class="card-body py-3 px-3">
                        @can('update-post', $post)
                            <a class="btn btn-info"
                                href="{{ route('user.post.update', ['user_id' => $post->user_id, 'post_id' => $post->id]) }}">edit</a>
                            {{-- <button class="btn btn-info" role="alert" href="" --}}
                            {{-- onclick="event.preventDefault();     --}}
                            {{-- document.getElementById('form-delete-{{ $post->id }}').submit();">delete</button> --}}
                            <form
                                action="{{ route('user.post.delete', ['user_id' => $post->user_id, 'post_id' => $post->id]) }}"
                                method="POST" id="form-delete-{{ $post->id }}" class="d-none">@csrf
                                @method('delete')
                            </form>
                            <x-DialogModal class="d-inline-block" name="Delete" 
                            message="Are you sure?" title="Delete Post" 
                            formName="form-delete-{{ $post->id }}"/>

                        @endcan
                    </div>
                </div>
            @empty
                <div class="flex-fill row border border-primary mt-2 alert alert-info">
                    There are no posts created yet.
                </div>
            @endforelse
        </div>
    </body>
@endsection
