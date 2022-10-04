@extends('layouts.app')
@section('content')
    {{-- <div class="my-2">
        <a href="{{ route('ftp_upload') }}"
            class="border border-primary d-block text-center underline-hover">
            -> Click For FTP Upload Page <- </a>
    </div> --}}

    <div class="bg-zinc-800 flex justify-center p-2" style="">
        <div class="flex w-2/3">
            <img id="my_profile_pic_holder"
                class="shrink-0 m-2 w-44 h-44 border border-red-600 rounded-full">
            <p class="shrink">
                <span>About Me</span>
                <br>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit
                expedita tempore
                voluptates tenetur porro rerum animi vero unde molestiae sint, fugiat officiis hic odio
                mollitia atque nemo libero autem deleniti.</p>
        </div>
    </div>

    <div class="flex flex-row justify-center border bg-zinc-900">
        <div class="border w-56 h-64 m-2 rounded cursor-pointer hover:bg-gradient-to-t hover:from-white">
            <a href="{{ route('web-developement') }}"
                class="no-underline border border-red-600 block h-full">Web Developement</a>
        </div>
        <div class="border w-56 h-64 m-2 rounded cursor-pointer hover:bg-gradient-to-t hover:from-white">
            <a href="{{ route('game-developement') }}"
                class="no-underline border border-red-600 block h-full">Game Developement</a>
        </div>
        <div
            class="border w-56 h-64 m-2 rounded cursor-pointer hover:bg-gradient-to-t hover:from-white">
            <a href="{{ route('cg-career') }}"
                class="no-underline border border-red-600 block h-full">CG Carrer</a>
        </div>
    </div>
@endsection
