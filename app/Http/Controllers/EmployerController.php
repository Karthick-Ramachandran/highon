<?php

namespace App\Http\Controllers;

use App\Mail\Greet;
use App\Models\Sub;
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

        $request->session()->flash('success', $request->name . " your registration was successful, Login to continue");
        return redirect('/login');
    }

    public function approve($id)
    {
        $app = User::find($id);

        $app->request_admin = 0;
        $app->is_admin = 1;
        $app->save();

        Session::flash('success', "Approved");
        return redirect('/admin/approve/employer');
    }

    public function ignore($id)
    {
        $app = User::where('id', $id)->first();
        $app->dont_show = 1;
        $app->save();
        Session::flash('success', "Hidden");
        return redirect('/admin/dashboard');
    }

    public function addSubs(Request $request)
    {
        $app = new Sub;

        $app->subs = $request->subs;

        $app->save();
        Session::flash('success', "Saved");
        return redirect('/admin/subs');
    }

    public function deleteSubs($id)
    {
        $app = Sub::find($id);
        $app->delete();
        Session::flash('success', "Deleted");
        return redirect('/admin/subs');
    }
}
