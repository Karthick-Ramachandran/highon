<?php

namespace App\Http\Controllers;

use App\Models\Second;
use Illuminate\Http\Request;
use Auth;

class SecondController extends Controller
{
    public function post(Request $request)
    {

        $this->validate($request, [
            "firstName" => 'required|min:3',
            "lastName" => 'required|min:3',
            "age" => 'required',
            "sex" => 'required',
            "nationality" => 'required|min:3',
            "qualification" => 'required|min:3',
            "exp" => 'required',
        ]);

        $app = new Second;
        $app->user_id = Auth::user()->id;
        $app->firstName = $request->firstName;
        $app->surname = $request->surname;
        $app->lastName = $request->lastName;
        $app->dob = $request->dob;
        $app->age = $request->age;
        $app->sex = $request->sex;
        $app->nationality = $request->nationality;
        $app->qualification = $request->qualification;

        if ($request->exp == "yes") {
            $app->exp = 1;
        } else {
            $app->exp = 0;
        }

        $app->save();

        $request->session()->flash('success', "Saved");

        return redirect('/dashboard');
    }

    public function edit(Request $request)
    {

        $this->validate($request, [
            "firstName" => 'required|min:3',
            "lastName" => 'required|min:3',
            "age" => 'required',
            "sex" => 'required',
            "nationality" => 'required|min:3',
            "qualification" => 'required',
            "exp" => 'required',
        ]);

        $app = Second::where('user_id', Auth::user()->id)->first();
        $app->user_id = Auth::user()->id;
        $app->firstName = $request->firstName;
        $app->surname = $request->surname;
        $app->lastName = $request->lastName;
        $app->dob = $request->dob;
        $app->age = $request->age;
        $app->sex = $request->sex;
        $app->nationality = $request->nationality;
        $app->qualification = $request->qualification;

        if ($request->exp == "yes") {
            $app->exp = 1;
        } else {
            $app->exp = 0;
        }

        $app->save();

        $request->session()->flash('success', "Saved");

        return redirect('/dashboard');
    }
}