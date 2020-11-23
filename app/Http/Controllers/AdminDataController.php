<?php

namespace App\Http\Controllers;

use App\Models\AdminData;
use Illuminate\Http\Request;
use Auth;

class AdminDataController extends Controller
{
    public function create(Request $request)
    {
        $data = AdminData::where('user_id', Auth::user()->id)->first();
        $data->user_id = Auth::user()->id;
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->business = $request->business;
        $data->country = $request->country;
        $data->reg = $request->reg;
        $data->industry = $request->industry;
        $data->bus_add = $request->bus_add;
        $data->contact = $request->contact;
        $data->save();
        $request->session()->flash('success', "Saved");
        return redirect()->back();
    }
}
