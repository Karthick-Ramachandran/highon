<?php

namespace App\Http\Controllers;

use App\Models\Second;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $users = Second::where('firstName ', 'LIKE', '%' . $request->name . '%')->get();

        return view('admin.search')->with('users', $users);
    }
}
