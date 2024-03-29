<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CGCareer;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\GameDevelopement;
use App\Http\Controllers\OrderShipmentController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\MyFtpController;
use App\Http\Controllers\WebDevelopement;
use Illuminate\Http\Request;
use App\Http\Controllers\WelcomeController;

Route::get('/', WelcomeController::class)->name('home');
Route::get('/components', function(){return view('components.footer');});

Route::get('/webdev', WebDevelopement::class)->name('web-developement');
Route::get('/gamedev', GameDevelopement::class)->name('game-developement');
Route::get('/cg', CGCareer::class)->name('cg-career');

Route::view('epicgames','epicgames.EpicGames')->name('epicgames');
Route::view('epicgames-faq','epicgames.EpicGames-FAQ')->name('epicgames-faq');
Route::view('epicgames-news','epicgames.EpicGames-news')->name('epicgames-news');
Route::view('epicgames-sign-in','epicgames.EpicGames-sign-in')->name('epicgames-sign-in');

Route::view('user/login', 'dashboard.user.login')->name('user.login')->middleware(['guest', 'PreventBackHistory']);
Route::view('user/register', 'dashboard.user.register')->name('user.register')->middleware(['guest', 'PreventBackHistory']);
Route::post('user/create', [UserController::class, 'create'])->name('user.create')->middleware(['guest', 'PreventBackHistory']);
// Route::post('user/check', [UserController::class, 'check'])->name('user.check')->middleware(['guest', 'PreventBackHistory']);
Route::post('user/authenticate', [UserController::class, 'authenticate'])->name('user.authenticate')->middleware(['guest', 'PreventBackHistory']);
Route::get('user/{user_id}/home', [UserController::class,'home'])->name('user.home')->middleware(['auth', 'PreventBackHistory']);
// Route::get('user/{user_id}/posts',[PostController::class,'index'])->name('user.post')->middleware(['auth']);
Route::get('user/{user_id}/posts',[PostController::class,'index'])->name('user.post');
Route::post('user/{user_id}/logout', [UserController::class, 'logout'])->name('user.logout')->middleware(['auth', 'PreventBackHistory']);
Route::post('user/{user_id}/posts/create',[PostController::class,'create'])->name('user.post.create')->middleware('auth');
Route::delete('user/{user_id}/posts/{post_id}/delete/',[PostController::class,'destroy'])->name('user.post.delete')->middleware('auth');
Route::get('user/{user_id}/posts/{post_id}/update',[PostController::class,'edit'])->name('user.post.update')->middleware('auth');
Route::post('user/{user_id}/posts/{post_id}/update',[PostController::class,'update'])->name('user.post.update')->middleware('auth');

Route::view('admin/login','dashboard.admin.login')->middleware(['guest', 'PreventBackHistory'])->name('admin.login');
Route::post('admin/check', [AdminController::class, 'check'])->middleware(['guest', 'PreventBackHistory'])->name('admin.check');
Route::view('admin/home', 'dashboard.admin.home')->middleware(['auth', 'PreventBackHistory'])->name('admin.home');
Route::post('admin/logout', [AdminController::class, 'logout'])->middleware(['auth', 'PreventBackHistory'])->name('admin.logout');

//Doctor routes ...
Route::prefix('doctor')->name('doctor.')->group(function () {
    Route::middleware(['guest:doctor', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'dashboard.doctor.login')->name('login');
        Route::view('/register', 'dashboard.doctor.register')->name('register');
        Route::post('/create', [DoctorController::class, 'create'])->name('create');
        Route::post('/check', [DoctorController::class, 'check'])->name('check');
    });
    Route::middleware(['auth:doctor', 'PreventBackHistory'])->group(function () {
        Route::view('/home', 'dashboard.doctor.home')->name('home');
        Route::post('/logout', [DoctorController::class, 'logout'])->name('logout');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
