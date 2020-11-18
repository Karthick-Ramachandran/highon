<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function edit(Request $request)
    {
        $data = Payment::where('id', '!=', 0)->first();
        $data->payment = $request->payment;
        $data->save();
        $request->session()->flash('success', "Edited");
    }
}
