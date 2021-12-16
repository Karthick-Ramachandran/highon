<?php

namespace App\Http\Controllers;

use App\Models\Application;
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
        $application = Application::where('user_id', auth()->user()->id)->where('is_completed', 0)->orderBy('created_at', 'desc')->first();


        if (Second::where('user_id', Auth::user()->id)->where('application_id', $application->id)->exists()) {
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
            $app->application_id = $application->id;
            $app->save();
            $complete = new SecondComplete;
            $complete->user_id = Auth::user()->id;
            $complete->application_id = $application->id;
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
        $application = Application::where('user_id', Auth::user()->id)->where('is_completed', 0)->orderBy('created_at', 'desc')->first();

        $app = Second::where('user_id', Auth::user()->id)->where('application_id', $application->id)->first();
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
