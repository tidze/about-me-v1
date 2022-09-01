<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor | Homepage</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <table class="table">
                    <tr>
                        <th scope="col">Name</td>
                        <th scope="col">Hospital</td>
                        <th scope="col">Phone</td>
                        <th scope="col">Email</td>
                        <th scope="col">Action</td>
                    </tr>
                    <tr>
                        <td>{{ (Auth::user())->name }}</td>
                        <td>{{ (Auth::user())->hospital }}</td>
                        <td>{{ (Auth::user())->phone }}</td>
                        <td>{{ (Auth::user())->email }}</td>
                        <td><a href="{{ route('doctor.logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                            <form action="{{ route('doctor.logout') }}" method="POST" class="d-none"
                            id="logout-form">@csrf</form></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
