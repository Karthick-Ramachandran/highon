<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\SecondCompleteController;
use App\Http\Controllers\SecondController;
use App\Models\Payment;
use App\Models\Qualification;
use App\Models\Second;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/employer/register', function () {
    return view('employer');
});

Route::post('/employer', [EmployerController::class, 'post']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/step/one', function () {
        if (Auth::user()->first) {
            if (Auth::user()->first->is_completed) {
                Session::flash('message', 'Not valid');
                return redirect()->back();
            } else {
                return view('step.stepone');
            }
        } else {
            return view('step.stepone');
        }
    });
    Route::post('/confirm', [FirstController::class, 'confirm']);
    Route::post('/confirm/candidate', [FirstController::class, 'confirmCan']);

    Route::post('/stepone', [FirstController::class, 'post']);
    Route::get('/step/two', function () {
        if (Auth::user()->first) {
            if (!Auth::user()->first->is_completed) {
                Session::flash('message', 'Not valid');
                return redirect()->back();
            } else {
                if (Second::where('user_id', Auth::user()->id)->exists()) {
                    return redirect('/edit/step/two');
                } else {
                    return view('step.steptwo');
                }
            }
        } else {
            Session::flash('message', 'Not valid');
            return redirect()->back();
        }
    });
    Route::get('/complete/second', function () {
        if (Auth::user()->first) {
            if (!Auth::user()->first->is_completed) {
                Session::flash('message', 'Not valid');
                return redirect()->back();
            } else {
                return view('step.complete');
            }
        } else {
            Session::flash('message', 'Not valid');
            return redirect()->back();
        }
    });
    Route::post('/steptwo', [SecondController::class, 'post']);
    Route::post('/steptwo/comp', [SecondCompleteController::class, 'post']);
    Route::get('/apply/new', [ApplicationController::class, 'get']);

    Route::post('/newapp', [ApplicationController::class, 'post']);
    Route::get('/complete/payment/new', [ApplicationController::class, 'complete']);
    Route::post('/payments/new', [ApplicationController::class, 'payment']);

    Route::get('/edit/step/two', function () {
        if (Second::where('user_id', Auth::user()->id)->exists()) {
            return view('step.editsteptwo');
        } else {
            return redirect()->back();
        }
    });
    Route::post('/editstep', [SecondController::class, 'edit']);
    Route::get('/payment', function () {
        $app = Payment::where('id', '!=', 0)->first();
        return view('payment')->with('app', $app);
    });

    Route::get('/add/exp', function () {
        if (Auth::user()->second) {
            if (Auth::user()->second->exp) {
                $app = Qualification::where('user_id', Auth::user()->id)->paginate(6);
                return view('step.experience')->with('app', $app);
            } else {
                Session::flash('message', 'Not valid');
                return redirect('/dashboard');
            }
        } else {
            Session::flash('message', 'Not valid');
            return redirect('/dashboard');
        }
    });
    Route::post('/add/exp', [QualificationController::class, 'post']);
    Route::get('delete/{id}', function ($id) {
        $app = Qualification::find($id);
        $app->delete();
        Session::flash('success', 'Delete');
        return redirect()->back();
    });
});

Route::get('payment-razorpay', [PaymentsController::class, 'create'])->name('paywithrazorpay');
Route::post('payment', [PaymentsController::class, 'payment'])->name('payment');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/dashboard', function () {
        return view('admin.dash');
    });
});
