<?php

namespace App\Http\Controllers;

use App\Models\First;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Greet;
use App\Models\Application;

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
            $app = new First;
            $app->user_id = Auth::user()->id;
            $app->country = $request->country;
            if ($request->country == "Singapore") {
                $app->permit = $request->permit;
            } else {
                $app->permit = "";
            }
            $app->position = $request->position;
            $app->save();
            $application = new Application;
            $application->user_id = Auth::user()->id;
            $application->country = $request->country;
            $application->permit = $request->permit;
            $application->position = $request->position;
            $application->save();
            $request->session()->flash('success', "Saved");
            return redirect('/dashboard');
        }
    }

    public function confirm()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->is_admin = 1;
        $user->confirmed = 1;
        $user->save();
        $details = [
            'title' => 'Welcome to Jobs on High, Happy to have you',
            'body' => ''
        ];
        Mail::to(Auth::user()->email)->send(new Greet($details));
        return redirect('/dashboard');
    }
    public function confirmCan()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->is_admin = 0;
        $user->confirmed = 1;
        $user->save();
        $details = [
            'title' => 'Welcome to Jobs on High, Happy to have you',
            'body' => 'Note : Pay one time registration fee through our www.jobsonhigh.com website ONLY. Jobsonhigh never ask any fee or payment on visa process. This is direct platform for (C2C)companies to candidates. So, no middle man, no agents. Good luck.'
        ];
        Mail::to(Auth::user()->email)->send(new Greet($details));
        return redirect('/dashboard');
    }
}
