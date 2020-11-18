<?php

namespace App\Http\Controllers;

use App\Models\First;
use Illuminate\Http\Request;
use Auth;

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
            $request->session()->flash('success', "Saved");
            return redirect('/dashboard');
        }
    }
}
