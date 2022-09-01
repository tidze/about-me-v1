<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 mt-4">
                <h4>Doctor Login</h4>
                <hr>
                <form action="{{ route('doctor.check') }}" method="POST">
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    @csrf
                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email"
                            value="{{ old('name') }}">
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Enter Password">
                            <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                            <br>
                            <a href="{{ route('doctor.register') }}">Create new Account</a>
                            <br>
                            <a href="{{ route('admin.login') }}">I'm an Admin</a>
                            <br>
                            <a href="{{ route('user.login') }}">I'm a User</a>
                            <br>
                            <a href="/">Back to homepage</a>
                        </form>
                    </div>
                </div>
            </div>
        </body>

        </html>
