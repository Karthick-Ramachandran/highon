<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\SecondController;
use App\Models\Payment;
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
    Route::post('/stepone', [FirstController::class, 'post']);
    Route::get('/step/two', function () {
        if (Auth::user()->first) {
            if (!Auth::user()->first->is_completed) {
                Session::flash('message', 'Not valid');
                return redirect()->back();
            } else {
                return view('step.steptwo');
            }
        } else {
            Session::flash('message', 'Not valid');
            return redirect()->back();
        }
    });
    Route::post('/steptwo', [SecondController::class, 'post']);
    Route::get('/edit/step/two', function () {
        if (Auth::user()->second) {
            if (!Auth::user()->second->is_completed) {
                Session::flash('message', 'Not valid');
                return redirect()->back();
            } else {
                return view('step.editsteptwo');
            }
        } else {
            Session::flash('message', 'Not valid');
            return redirect()->back();
        }
    });
    Route::post('/editstep', [SecondController::class, 'edit']);
    Route::get('/payment', function () {
        $app = Payment::where('id', '!=', 0)->first();
        return view('payment')->with('app', $app);
    });
});

Route::get('payment-razorpay', [PaymentsController::class, 'create'])->name('paywithrazorpay');
Route::post('payment', [PaymentsController::class, 'payment'])->name('payment');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/dashboard', function () {
        return view('admin.dash');
    });
});
