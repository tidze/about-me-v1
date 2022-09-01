@extends('layouts.app')
@section('title','Home | Dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 mt-4">
            <h4>Homepage</h4><hr>
            <table class="table">
                <tr>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Action</td>
                </tr>
                <tr>
                    <td>{{ Auth::user()->name }}</td>
                    <td>{{ Auth::user()->email }}</td>
                    <td>
                        <a href="{{ route('user.logout',['user_id'=>Auth::user()->id]) }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="underline-hover">Logout</a>
                        <form action="{{ route('user.logout',['user_id'=>Auth::user()->id]) }}" method="POST" class="d-none"
                        id="logout-form">@csrf</form>
                    </td>
                </tr>
            </table>
            {{-- <br> --}}
            {{-- @livewire('back-to-homepage', --}}
            {{-- ['user_id'=>Auth::user()->id,'text'=>'Go To Posts','route_name'=>'user.post']) --}}
            {{-- @livewire('back-to-homepage', --}}
            {{-- ['user_id'=>Auth::user()->id,'text'=>'Back To Homepage','route_name'=>'home']) --}}
            <x-back-to-homepage text="Go To Posts" :userId="Auth::user()->id" routeName="user.post"/>
            <x-back-to-homepage text="Back To Homepage" :userId="Auth::user()->id" routeName="home"/>
        </div>
    </div>
</div>
@endsection