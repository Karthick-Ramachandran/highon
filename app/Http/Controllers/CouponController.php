<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Session;

class CouponController extends Controller
{
    public function post(Request $request)
    {
        $this->validate($request, [
            'coupon_code' => 'required',
            'amount' => 'required'
        ]);
        $c = new Coupon;
        $c->amount = $request->amount;
        $c->coupon_code = $request->coupon_code;
        $c->save();
        $request->session()->flash('success', "Coupon created");
        return redirect()->back();
    }

    public function delete($id)
    {
        $c = Coupon::find($id);
        $c->delete();
        Session::flash('success', "Coupon deleted");
        return redirect()->back();
    }
}
