<?php

namespace App\Http\Controllers;

use App\Mail\Greet;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $app = new Contact;
        $app->name = $request->name;

        $app->email = $request->email;
        $app->message = $request->message;
        $app->save();
        $details = [
            'title' => 'Thank you for reaching out to Jobs on High',
            'body' => 'Your query will be answered within in 48 hours'
        ];

        Mail::to($request->email)->send(new Greet($details));

        $request->session()->flash('success', "Your Request sent, Thank you");

        return redirect()->back();
    }
}
