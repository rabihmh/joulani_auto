<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('front.user.contact');
    }

    public function send(Request $request)
    {

        $email = 'info@joulani-auto.com';
        $data = [
            'title' => 'Request car',
            'from_email' => $request->post('email'),
            'from_name' => $request->post('name'),
            'message' => $request->post('message')

        ];
        Mail::to($email)->send(new ContactMail($data));
    }
}
