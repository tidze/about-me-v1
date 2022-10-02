@extends('layouts.app')
@section('content')
    {{-- <div class="my-2">
        <a href="{{ route('ftp_upload') }}"
            class="border border-primary d-block text-center underline-hover">
            -> Click For FTP Upload Page <- </a>
    </div> --}}
    <div style="font-family: Bzar;" class="flex justify-center items-center">
        <button type="button"
            class="text-gray-900 bg-red border-2 dark:border-gray-700 focus:outline-none
            hover:bg-red  focus:ring-gray-200 font-medium rounded-full
            text-sm">
            <a style="dark:border-grey-900 text-decoration: none;" href="{{ route('epicgames') }}"
                class="dark:text-white text-white p-4 d-block text-center hover:text-decoration-none
                px-5 py-2.5 mr-2 w-full dark:hover:text-red-900 hover:text-red-900">
                نمونه کار قالب سایت کلیک کنید
            </a>
        </button>
    </div>
    <div class="flex flex-row justify-center border bg-zinc-900">
        <div class="border w-56 h-64 m-2 rounded cursor-pointer hover:bg-gradient-to-t hover:from-white">
            <a href="{{ route('web-developement') }}" class="no-underline border border-red-600 block h-full">Web Developement</a>
        </div>
        <div class="border w-56 h-64 m-2 rounded cursor-pointer hover:bg-gradient-to-t hover:from-white">
            <a href="{{ route('game-developement') }}" class="no-underline border border-red-600 block h-full">Game Developement</a>
        </div>
        <div class="border w-56 h-64 m-2 rounded cursor-pointer hover:bg-gradient-to-t hover:from-white">
            <a href="{{ route('cg-career') }}" class="no-underline border border-red-600 block h-full">CG Carrer</a>
        </div>
    </div>

@endsection
