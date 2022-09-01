@extends('layouts.app')
@section('content')
@section('title', 'Upload | FTP')

<body class="">
    <div class="container">
        <div class="row justify-content-center">
            <form class="col-auto border border-secondary rounded p-4 mt-4" action="{{ route('ftp_upload') }}"
                method="POST" enctype="multipart/form-data">
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
                <h1 class="text-secondary">Upload File | FTP</h1>
                <hr>
                <br>
                <input class="form-control mb-2 d-inline-block" type="file" name="mfile">
                <input class="form-control btn-primary" type="submit" value="Submit">
            </form>
        </div>
        @if ($contents)

            <div class="row justify-content-center">
                <div class="col-auto">
                    <table class="table"> 
                        <tr>
                            <td>#</td>
                            <td>File</td>
                        </tr>
                        @foreach ($contents as $key => $value)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $value }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        @endif
    </div>
</body>
@endsection
