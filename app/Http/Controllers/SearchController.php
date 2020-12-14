<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Second;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request, $country)
    {
        $users = Application::where('is_completed', 1)->where('sub', 'LIKE', '%' . $request->position . '%')->orWhere('position', 'LIKE', '%' . $request->position . '%')->where('is_completed', 1)->where('country', $country)->paginate(9);

        return view('admin.search')->with('users', $users);
    }
}
