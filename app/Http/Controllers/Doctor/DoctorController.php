<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:doctors,email',
            'hospital' => 'required',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password',
        ]);

        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->hospital = $request->hospital;
        $doctor->password = Hash::make($request->hospital);
        $save = $doctor->save();

        if ($save) {
            return redirect()->back()->with('success', 'You are now registered successfully as a Doctor');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, failed to register');
        }
    }

    function check(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'email', 'exists:doctors,email'],
                'password' => ['required', 'min:5', 'max:30'],
            ],
            [
                'email.exists' => 'This email is not exists in doctors table',
            ]
        );

        // if validation success check the email and password

        $creds = $request->only('email', 'password');
        if (Auth::guard('doctor')->attempt($creds)) {
            return redirect()->route('doctor.home');
        } else {
            return redirect()->route('doctor.login')->with('fail', 'Incorrect Credentials');
        }
    }

    function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
