<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $users = User::all();
        $posts = Post::all();
        $procedure = DB::select('CALL UsersWithPosts()');
        return view('welcome',['posts'=>$posts,'users'=>$users,'procedure'=>$procedure]);
    }
}
