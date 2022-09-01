<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard | Home</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="bg-info">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4 pt-4">
                    <h4>
                        Admin Homepage
                    </h4>
                    <hr>
                    <table class="table">
                        <tr>
                            <td scope="col">Name</td>
                            <td scope="col">Email</td>
                            <td scope="col">Phone</td>
                            <td scope="col">Action</td>
                        </tr>
                        <tr>
                            <td>{{ Auth::guard('admin')->user()->name }}</td>
                            <td>{{ Auth::guard('admin')->user()->email }}</td>
                            <td>{{ Auth::guard('admin')->user()->phone }}</td>
                            <td><a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                                <form action="{{ route('admin.logout') }}" id="logout-form" 
                                method="post">@csrf</form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
