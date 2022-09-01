@extends('layouts.app')
@section('content')
    <div class="row my-2">
        <a href="{{ route('ftp_upload') }}"
            class="border border-primary d-block text-center underline-hover">
            -> Click For FTP Upload Page <- </a>
    </div>
    <div class="row my-2 px-2">
        <div style="font-family: Bzar;" class="flex justify-center items-center">
            <button type="button" 
            class="text-gray-900 bg-red border-2 dark:border-gray-700 focus:outline-none 
            hover:bg-red  focus:ring-gray-200 font-medium rounded-full 
            text-sm" >
                <a style="dark:border-grey-900 text-decoration: none;" href="{{ route('epicgames') }}" 
                class="dark:text-white text-white p-2 d-block text-center hover:text-decoration-none
                px-5 py-2.5 mr-2 w-full dark:hover:text-red-900 hover:text-red-900">
                    نمونه کار قالب سایت کلیک کنید
                </a>
            </button>
    </div>
@endsection
