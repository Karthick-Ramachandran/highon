<?php

namespace App\Http\Controllers;

use App\Mail\Greet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Session;

class EmployerController extends Controller
{
    public function post(Request $request)
    {
        $this->validate($request, [
            "name" => 'required',
            "email" => 'required|email|unique:users',
            "password" => 'required|min:6'
        ]);
        $app = new User;

        $app->name = $request->name;
        $app->email = $request->email;
        $app->password = Hash::make($request->password);
        $app->is_admin = 0;
        $app->save();
        $details = [
            'title' => 'Welcome to Jobs on High',
            'body' => 'We are happy to welcome you'
        ];
        Mail::to($request->email)->send(new Greet($details));
        $request->session()->flash('success', $request->name . " your registration was successful, Login to continue");
        return redirect('/login');
    }

    public function approve($id)
    {
        $app = User::find($id);

        $app->request_admin = 0;
        $app->is_admin = 1;
        $app->save();
        $details = [
            'title' => 'Hello' . $app->name,
            'body' => 'Your request for employer registration is approved. Start hiring!!!'
        ];
        Mail::to($app->email)->send(new Greet($details));
        Session::flash('success', "Approved");
        return redirect('/admin/approve/employer');
    }
}
