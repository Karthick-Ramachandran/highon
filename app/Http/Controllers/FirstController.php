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
        $check = Application::where('user_id', Auth::user()->id)->where('country', $request->country)->first();
        if ($check) {
            $request->session()->flash('message', "you have already applied for this country");
            return redirect()->back();
        } else {
            $payment = Payment::where('id', '!=', 0)->first();

            $application = new Application;
            $application->user_id = Auth::user()->id;
            $application->country = $request->country;
            $application->permit = $request->permit;
            $application->position = $request->position;
            $application->sub = $request->sub;

            $application->amount = $payment->payment;
            $application->save();
            $app = new First;
            $app->application_id = $application->id;
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
