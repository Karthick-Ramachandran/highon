<?php

namespace App\Http\Controllers;

use App\Mail\Greet;
use App\Models\Application;
use App\Models\Third;
use Illuminate\Http\Request;

use Razorpay\Api\Api;

use Session;
use Redirect;
use Auth;
use Illuminate\Support\Facades\Mail;

class PaymentsController extends Controller
{
    public function create()
    {
        return view('payWithRazorpay');
    }

    public function payment(Request $request)
    {
        $input = $request->all();

        $api = new Api("rzp_live_yLTTpZJyL1x1a3", "MmUu9W7WoNphZK3Hb4jJZyFj");

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

        $payme = new Third;

        $payme->user_id = Auth::user()->id;
        $payme->paymemtType = "Razorpay";
        $payme->txncode = "123" . Auth::user()->id;
        $payme->message = "Payment success";
        $payme->is_completed = 1;

        $app = Application::where("user_id", Auth::user()->id)->first();
        $app->is_completed = 1;
        $app->save();
        $payme->save();
        $details = [
            'title' => 'Congrats',
            'body' => 'Your payment is complete'
        ];
        Mail::to(Auth::user()->email)->send(new Greet($details));
        return redirect('/dashboard');
    }
}
