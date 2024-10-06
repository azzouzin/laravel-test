<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class BookingsController extends Controller
{
    function myBookings(Request $request)
    {
        return $request->all();
    }

    function sayHello($d)
    {
        return "Say Hello World You are logged IN" . $d;
    }
}
