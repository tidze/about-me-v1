<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login User</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="bg-info">

        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4 my-4 my-4">
                    <h4>Admin Login</h4>
                    <hr>
                    <form action="{{ route('admin.check') }}" method="POST" autocomplete="off">
                        @if (Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @endif
                        @csrf
                        {{-- @method('POST') --}}
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input value="{{ old('email') }}" type="text" class="form-control" name="email"
                                placeholder="Enter email address">
                            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group mt-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter Password">
                                <div class="form-group mt-3">
                                    <label for="flex-check-default" class="form-check-label">Show Password</label>
                                    <input type="checkbox" name="showpassword" id="showpassword" class="form-check-input"
                                        onclick="changePass()">
                                </div>
                                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                                @if (Route::has('admin.register'))
                                    <a href="{{ route('admin.register') }}">Create new Account</a>
                                @endif
                                <br>
                                <a href="{{ route('user.login') }}">I'm a User</a>
                                <br>
                                <a href="{{ route('doctor.login') }}">I'm a Doctor</a>
                                <br>
                                <a href="/">Back to Homepage</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function changePass() {
                    var x = document.getElementById("password");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>
        </body>

        </html>
