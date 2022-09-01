@extends('layouts.app')
@section('title','User | Register')
@section('content')
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 my-4">
                <h4>Register User</h4><hr>
                <form action="{{ route('user.create') }}" method="POST" autocomplete="off">
                    @if (Session::get('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                    @csrf
                    <div class="form-group mt-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Enter full name" class="form-control"
                            value="{{ old('name') }}">
                        <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        <input type="text" name="email" placeholder="Enter email address" class="form-control"
                            value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Enter password" class="form-control"
                            value="{{ old('password') }}">
                        <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" name="cpassword" placeholder="Enter confirm password"
                            class="form-control" value="{{ old('cpassword') }}">
                        <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                    <br>
                    <a href="{{ route('user.login') }}">I Already Have An Account</a>
                    <br>
                    <a href="{{ route('admin.login') }}">I'm an Admin</a>
                    <br>
                    <a href="{{ route('user.register') }}">I'm a Doctor</a>
                    <br>
                    <a href="/">Back to homepage</a>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection