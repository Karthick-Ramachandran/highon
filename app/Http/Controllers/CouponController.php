<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Auth;
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

    public function applycoupon(Request $request)
    {
        $app = Application::where('user_id', Auth::user()->id)->where('is_completed', 0)->first();
        if ($app->is_coupon_code_applied) {
            $request->session()->flash('message', "Coupon Already applied");
            return redirect()->back();
        } else {
            if (Coupon::where('coupon_code', '=', $request->coupon_code)->exists()) {
                $cou = Coupon::where('coupon_code', '=', $request->coupon_code)->first();
                $app->amount = $app->amount - $cou->amount;
                $app->is_coupon_code_applied = 1;
                $app->save();
                $request->session()->flash('success', "Coupon Applied Successfully");
                return redirect()->back();
            } else {
                $request->session()->flash('message', "Coupon not found");
                return redirect()->back();
            }
        }
    }
}
