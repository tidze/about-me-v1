<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Mail\WelcomeMail;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderShipmentController extends Controller
{
    public function __invoke(){
        // $doctor = Doctor::findorFail(1);
        // Mail::to('ardellwebber@gmail.com')->send(New OrderShipped($doctor));
        Mail::to('ardellwebber@gmail.com')->send(new WelcomeMail());
        return new WelcomeMail();

    }
}
