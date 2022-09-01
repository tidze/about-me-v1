@extends('layouts.app')
@section('title','User | Login')
@section('content')
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 my-4 my-4">
                <h4>Login User</h4>
                <hr>
                <form action="{{ route('user.authenticate') }}" method="POST" autocomplete="off">
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    @csrf
                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        <input value="{{ old('email') }}" type="text" class="form-control" name="email"
                            placeholder="Enter email address">
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" placeholder="Enter Password">
                            <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                            <br>
                            <a href="{{ route('user.register') }}">Create new Account</a>
                            <br>
                            <a href="{{ route('admin.login') }}">I'm an Admin</a>
                            <br>
                            <a href="{{ route('doctor.login') }}">I'm a Doctor</a>
                            <br>
                            <a href="/">Back to homepage</a>
                        </form>
                    </div>
                </div>
            </div>
        </body>
@endsection