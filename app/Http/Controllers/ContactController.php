<?php

namespace App\Http\Controllers;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('content.contact');
    }
    
    public function sendEmail(Request $request){
        $request->validate([
            'message' => 'required|min:5',
          ]);
        $name = Auth::user()->name;
        $email = Auth::user()->email;
        $mailmessage = $request->message;
        $subject = 'user client - AlManara Library';
        $toemail = 'mahmoudyatro@gmail.com';
       $response = Mail::to($toemail)->send(new ContactMail($name , $mailmessage , $subject , $email));
       return redirect()->back()->with('msg' , 'your mail has been send successfuly!');
        
    }
}
