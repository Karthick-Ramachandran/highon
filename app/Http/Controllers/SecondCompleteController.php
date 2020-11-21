<?php

namespace App\Http\Controllers;

use App\Models\SecondComplete;
use Illuminate\Http\Request;
use App\Models\Second;
use Auth;

class SecondCompleteController extends Controller
{
    public function post(Request $request)
    {
        $this->validate($request, [
            "skills" => 'required',
            "notice" => 'required',
            "mailing_add" => 'required',
            "email" => 'required',
            "phone" => 'required|min:10',
            "photo" => 'required|image',
            "passport" => 'required',
            "copy" => 'required'
        ]);

        $app = SecondComplete::where('user_id', Auth::user()->id)->first();
        $app->user_id = Auth::user()->id;
        $app->skills = $request->skills;
        $app->notice = $request->notice;
        $app->height = $request->height;
        $app->weight = $request->weight;
        $app->waist = $request->waist;
        $app->shoe = $request->shoe;
        $app->address = $request->address;
        $app->mailing_add = $request->mailing_add;
        $app->email = $request->email;
        $app->phone = $request->phone;
        $app->passport = $request->passport;
        $image = $request->copy;
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('passport', $image_new_name);
        $app->copy = $image_new_name;
        $imageup = $request->photo;
        $imageup_new_name = time() . $imageup->getClientOriginalName();
        $imageup->move('books', $imageup_new_name);
        $app->photo = $imageup_new_name;
        $app->is_completed = 1;

        $app->save();
        $data = Second::where('user_id', Auth::user()->id)->first();
        $data->is_completed = 1;
        $data->save();
        $request->session()->flash('success', "Saved");

        return redirect('/dashboard');
    }
}
