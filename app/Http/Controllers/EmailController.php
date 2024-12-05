<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\UserMailer;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PharIo\Manifest\Email;

class EmailController extends Controller
{
    //

    public function sendEmail()
    {
        Mail::to("merouaniadh@gmail.com")->send(new UserMailer());
        return 'email.sendEmail';
    }
}
