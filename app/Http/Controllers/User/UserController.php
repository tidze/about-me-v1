<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function home($user_id)
    {
        # code...
        // dd('home'.$user_id);
        // dd($id);
        return view ('dashboard.user.home',['user_id'=>$user_id]);   
    }
    function create(Request $request)
    {
        // Validate Inputs
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:5', 'max:30'],
            'cpassword' => ['required', 'min:5', 'max:30', 'same:password'],
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        // dd($user);
        $save = $user->save();
        if ($save) {
            return redirect()->back()->with('success', 'A new user created succesfully');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, failed to register');
        }
    }
    function check(Request $request)
    {
        //validate logged user inputs
        $request->validate(
            [
                'email' => ['required', 'email', 'exists:users,email'],
                'password' => ['required', 'min:5', 'max:30'],
            ],
            [
                'email.exists' => 'This email is not exists on users table',
            ]
        );
        $cred = $request->only('email', 'password');
        if (Auth::attempt($cred)) {
            return redirect()->route('user.home',['user_id'=>1]);
        } else {
            return redirect()->route('user.login')->with('fail', 'Incorrect credentials');
        }
    }
    // i made this one this is alternative you can use check() method instead 
    function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $email = $request->input('email');
        // $id= $request->input('id');

        $id= User::where('email',$email)->value('id');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // return view('dashboard.user.home');
            // return redirect('/user/'.$id.'/home');
            return redirect()->route('user.home',['user_id'=>$id]);
        }else{
            return redirect()->route('user.login')->with('fail', 'The provided credentials do not match our records.');
        }

        // return back()->withErrors('fail','The provided credentials do not match our records.');
        // return back()->with('fail', 'The provided credentials do not match our records.');
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
