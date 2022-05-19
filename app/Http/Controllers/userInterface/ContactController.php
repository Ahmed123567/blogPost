<?php

namespace App\Http\Controllers\userinterface;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        return view('userInterface.contact.contact');
    }
    public function sendEmail(Request $req){


        $data = $req->all();
       // dd($data);
        $user = User::find($data['user_id']);

       // dd($user);
        
        $user-> message = $data['content'];

        Mail::to('moelshazlee101@gmail.com')->send(new ContactMail($user));




    }
}
