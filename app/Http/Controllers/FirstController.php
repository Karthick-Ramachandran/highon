<?php

namespace App\Http\Controllers;

use App\Models\First;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Greet;
use App\Models\AdminData;
use App\Models\Application;
use App\Models\Payment;

class FirstController extends Controller
{


    public function post(Request $request)
    {
        $this->validate($request, [
            "position" => 'required',
            "country" => 'required'
        ]);
        if (Auth::user()->first) {
            $request->session()->flash('message', "Failed, You already Saved");

            return redirect()->back();
        } else {
            $payment = Payment::where('id', '!=', 0)->first();
            $app = new First;
            $app->user_id = Auth::user()->id;
            $app->country = $request->country;
            if ($request->country == "Singapore") {
                $app->permit = $request->permit;
            } else {
                $app->permit = "";
            }
            $app->sub = $request->sub;

            $app->position = $request->position;
            $app->save();
            $application = new Application;
            $application->user_id = Auth::user()->id;
            $application->country = $request->country;
            $application->permit = $request->permit;
            $application->position = $request->position;
            $application->sub = $request->sub;

            $application->amount = $payment->payment;
            $application->save();
            $request->session()->flash('success', "Saved");
            return redirect('/dashboard');
        }
    }

    public function confirm(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->is_admin = 0;
        $user->confirmed = 1;
        $user->request_admin = 1;
        $user->save();

        $admin = new AdminData;
        $admin->user_id  = Auth::user()->id;
        $admin->save();

        return redirect('/dashboard');
    }
    public function confirmCan()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->is_admin = 0;
        $user->confirmed = 1;
        $user->save();

        return redirect('/dashboard');
    }
}
