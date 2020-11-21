<?php

namespace App\Http\Controllers;

use App\Models\Second;
use App\Models\SecondComplete;
use Illuminate\Http\Request;
use Auth;

class SecondController extends Controller
{
    public function post(Request $request)
    {

        $this->validate($request, [
            "firstName" => 'required|min:3',
            "age" => 'required',
            "sex" => 'required',
            "nationality" => 'required',
            "qualification" => 'required',
            "exp" => 'required',
        ]);
        if (Second::where('user_id', Auth::user()->id)->exists()) {
            return redirect('/edit/step/two');
        } else {
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
            $app->is_completed = 0;

            $app->save();
            $complete = new SecondComplete;

            $complete->user_id = Auth::user()->id;

            $complete->save();


            return redirect('/complete/second');
        }
    }

    public function edit(Request $request)
    {

        $this->validate($request, [
            "firstName" => 'required|min:3',
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
        $app->is_completed = 0;

        $app->save();


        return redirect('/complete/second');
    }
}
