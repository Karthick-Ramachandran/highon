<?php

namespace App\Http\Controllers;

use App\Models\Qualification;
use Illuminate\Http\Request;
use Auth;

class QualificationController extends Controller
{
    public function post(Request $request)
    {
        $this->validate($request, [
            "company" => 'required',
            "country" => 'required',
            "duration" => 'required',
            "position" => 'required'
        ]);

        $app = new Qualification;
        $app->user_id = Auth::user()->id;
        $app->company = $request->company;
        $app->country = $request->country;
        $app->permit = $request->permit;
        $app->position = $request->position;
        $app->duration = $request->duration;
        $app->save();
        $request->session()->flash('success', "Saved");
        return redirect('/dashboard');
    }
}
