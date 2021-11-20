<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Payment;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Mail;
use App\Mail\Greet;
use Auth;
use Session;
use App\Models\Sub;


class ApplicationController extends Controller
{
    public function get()
    {
        if (Auth::user()->third) {
            if (Auth::user()->third->is_completed) {
                if (Application::where('user_id', Auth::user()->id)->where('is_completed', 0)->exists()) {
                    Session::flash('message', "Please complete the payment for your previous application");
                    return redirect('complete/payment/new');
                } else {
                    $users = Sub::all();
                    return view('apply.new')->with('users', $users);
                }
            } else {

                return redirect('/dashboard');
            }
        } else {
            return redirect('/dashboard');
        }
    }
    public function complete()
    {
        if (Auth::user()->third) {
            if (Auth::user()->third->is_completed) {
                if (Application::where('user_id', Auth::user()->id)->where('is_completed', 0)->exists()) {
                    $application = Application::where('user_id', Auth::user()->id)->where('is_completed', 0)->first();
                    $app = Payment::where('id', '!=', 0)->first();
                    return view('apply.pay')->with('app', $app)->with('application', $application);
                } else {
                    return redirect('/dashboard');
                }
            } else {

                return redirect('/dashboard');
            }
        } else {
            return redirect('/dashboard');
        }
    }
    public function post(Request $request)
    {
        $this->validate($request, [
            "position" => 'required',
            "country" => 'required'
        ]);
        if (Application::where('country', $request->country)->where('user_id', Auth::user()->id)->exists()) {
            $request->session()->flash('success', "You already applied for " . $request->country);
            return redirect()->back();
        } else {
            $payment = Payment::where('id', '!=', 0)->first();
            $application = new Application;
            $application->user_id = Auth::user()->id;
            $application->country = $request->country;
            $application->permit = $request->permit;
            $application->position = $request->position;
            $application->amount = $payment->payment;
                      $application->sub = $request->sub;


            $application->save();
            $request->session()->flash('success', "Saved");
            return redirect('/complete/payment/new');
        }
    }
    public function payment(Request $request)
    {
        $input = $request->all();

        $api = new Api('rzp_live_yLTTpZJyL1x1a3', "MmUu9W7WoNphZK3Hb4jJZyFj");

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
            } catch (\Exception $e) {
                return  $e->getMessage();
                \Session::flash('message', $e->getMessage());
                return redirect()->back();
            }
        }

        \Session::flash('success', 'Payment successful');

        $app = Application::where("user_id", Auth::user()->id)->where('is_completed', 0)->first();
        $app->is_completed = 1;
        $app->save();

        return redirect('/dashboard');
    }
}
