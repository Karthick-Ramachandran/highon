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


        $request->session()->flash('success', "Your Request sent, Thank you");

        return redirect()->back();
    }
}
