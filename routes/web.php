<?php

use App\Http\Controllers\AdminDataController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SecondCompleteController;
use App\Http\Controllers\SecondController;
use App\Models\AdminData;
use App\Models\Application;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\First;
use App\Models\Payment;
use App\Models\Qualification;
use App\Models\Second;
use App\Models\SecondComplete;
use App\Models\Sub;
use App\Models\User;
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
Route::post('/post/contact', [ContactController::class, 'send']);

Route::post('/employer', [EmployerController::class, 'post']);

Route::group(['middleware' => 'auth'], function () {

    Route::post('/cancel/app', function () {
        $app = Application::where('user_id', auth()->user()->id)->where('is_completed', 0)->orderBy('created_at', 'desc')->first();
        // check if $app exists
        if ($app) {
            $app->delete();
            $firsts = First::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
            $firsts->delete();
            $seconds = Second::where('user_id', auth()->user()->id)->where('application_id', $app->id)->orderBy('created_at', 'desc')->first();
            if ($seconds) {
                $seconds->delete();
            }
            $secondComplete = SecondComplete::where('user_id', auth()->user()->id)->where('application_id', $app->id)->orderBy('created_at', 'desc')->first();
            if ($secondComplete) {
                $secondComplete->delete();
            }
            return redirect('/step/one');
        } else {
            session()->flash('message', 'You already paid for the application, Create new application if you want apply for new country ');
            return redirect('/step/one');
        }

    });

    Route::get('/step/one', function () {
        $app = Application::where('user_id', auth()->user()->id)->where('is_completed', 0)->orderBy('created_at', 'desc')->first();
        if ($app) {
                Session::flash('message', 'Not valid');
                return redirect()->back();
        } else {
            $users = Sub::all();
            $countries = Country::all();
            return view('step.stepone')->with('users', $users)->with('countries', $countries);

        }
    });
    Route::post('/apply/coupon', [CouponController::class, 'applycoupon'])->name('couponapply');

    Route::post('/confirm', [FirstController::class, 'confirm']);
    Route::post('/confirm/candidate', [FirstController::class, 'confirmCan']);

    Route::post('/stepone', [FirstController::class, 'post']);
    Route::get('/step/two', function () {
        // check if applucation exists
        $app = Application::where('user_id', auth()->user()->id)->where('is_completed', 0)->orderBy('created_at', 'desc')->first();
        if ($app) {
        if (Auth::user()->first) {
                $application = Application::where('user_id', Auth::user()->id)->where('is_completed', 0)->orderBy('created_at', 'desc')->first();
                if (Second::where('user_id', Auth::user()->id)->where('application_id', $application->id)->exists()) {
                    return redirect('/edit/step/two');
                } else {
                    return view('step.steptwo');
                }
        } else {
            Session::flash('message', 'Not valid');
            return redirect()->back();
        }
    }else {
        Session::flash('message', 'Not valid');
        return redirect()->back();
    }

    });
    Route::get('/complete/second', function () {
        if (Auth::user()->first) {
            $application = Application::where('user_id', Auth::user()->id)->where('is_completed', 0)->orderBy('created_at', 'desc')->first();
            if (Second::where('user_id', Auth::user()->id)->where('application_id', $application->id)->exists()) {
                return view('step.complete');
            } else {
                Session::flash('message', 'Not valid');
                return redirect()->back();
            }
        } else {
            Session::flash('message', 'Not valid');
            return redirect()->back();
        }
    });
    Route::post('/steptwo', [SecondController::class, 'post']);
    Route::post('/steptwo/comp', [SecondCompleteController::class, 'post']);
    // Route::get('/apply/new', [ApplicationController::class, 'get']);

    Route::post('/newapp', [ApplicationController::class, 'post']);
    Route::get('/complete/payment/new', [ApplicationController::class, 'complete']);
    Route::post('/payments/new', [ApplicationController::class, 'payment']);
    Route::post('/admin/data', [AdminDataController::class, 'create']);

    Route::get('/edit/step/two', function () {
        $app = Application::where('user_id', auth()->user()->id)->where('is_completed', 0)->orderBy('created_at', 'desc')->first();
        if ($app) {
        $application = Application::where('user_id', Auth::user()->id)->where('is_completed', 0)->orderBy('created_at', 'desc')->first();
        if (Second::where('user_id', Auth::user()->id)->where('application_id', $application->id)->exists()) {
            return view('step.editsteptwo');
        } else {
            return redirect()->back();
        }
    } else {
        return redirect('/dashboard');

    }
    });
    Route::post('/editstep', [SecondController::class, 'edit']);
    Route::get('/payment', function () {
        $apps = Application::where('user_id', auth()->user()->id)->where('is_completed', 0)->orderBy('created_at', 'desc')->first();
        // check if $app exists
        if ($apps) {
        $application = Application::where('user_id', Auth::user()->id)->where('is_completed', 0)->first();
        $app = Payment::where('id', '!=', 0)->first();
        // check if seconds is completed and move
        if (SecondComplete::where('user_id', Auth::user()->id)->where('application_id', $application->id)->exists()) {
            return view('payment')->with('app', $app)->with('application', $application);
        } else {
            Session::flash('message', 'Not valid');
            return redirect('/dashboard');
        }
        } else {
            Session::flash('message', 'Not valid');
            return redirect('/dashboard');
        }
    });

    Route::get('/add/exp', function () {
     $app = Qualification::where('user_id', Auth::user()->id)->paginate(6);
     return view('step.experience')->with('app', $app);
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
Route::get('/terms-and-conditions', function () {
    return view('terms');
});

Route::get('/privacy-policy', function () {
    return view('privacy');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/dashboard', function () {
        $users = User::where('is_admin', 0)->where('is_super_admin', 0)->where('request_admin', 0)->get();
        $company = AdminData::count();

        return view('admin.dash')->with('users', $users)->with('company', $company);
    });

    Route::get('/singapore/{pass}', function ($pass) {
        $users = Application::where('country', '=', "Singapore")->where('permit', '=', $pass)->where('is_completed', 1)->paginate(27);

        return view('admin.singapore')->with('users', $users);
    })->name('singapore');
    Route::get('/dubai', function () {
        $users = Application::where('country', '=', "Dubai")->where('is_completed', 1)->paginate(27);
        return view('admin.dubai')->with('users', $users);
    })->name('dubai');
    Route::get('/malaysia', function () {
        $users = Application::where('country', '=', "Malaysia")->where('is_completed', 1)->paginate(27);
        return view('admin.malaysia')->with('users', $users);
    })->name('malaysia');
    Route::get('/qatar', function () {
        $users = Application::where('country', '=', "Qatar")->where('is_completed', 1)->paginate(27);
        return view('admin.qatar')->with('users', $users);
    })->name('qatar');
    Route::get('/country/{country}', function ($country) {
        $users = Application::where('country', '=', $country)->where('is_completed', 1)->paginate(27);
        return view('admin.others')->with('users', $users)->with('country', $country);
    })->name('others');
    Route::get('/users/{id}/{appId}', function ($id, $appId) {
        $users = User::where('id', $id)->first();
        $qual = Qualification::where('user_id', $users->id)->paginate(3);
        return view('admin.view')->with('users', $users)->with('qual', $qual)->with('appId', $appId);
    })->name('detailspage');
    Route::get('/search/emp/{country}', [SearchController::class, 'search'])->name('countrysearch');
});



Route::group(['prefix' => 'admin', 'middleware' => 'super'], function () {
    Route::get('/coupons', function () {
        $coupon = Coupon::paginate(9);
        return view('admin.coupon')->with('coupon', $coupon);
    })->name('coupons');

    Route::post('/coupon', [CouponController::class, 'post'])->name('createcoupon');
    Route::get('/coupon/{id}', [CouponController::class, 'delete'])->name('deletecoupon');
    Route::get('/change/payment', function () {
        $pay = Payment::where('id', '!=', 0)->first();
        return view('admin.changepay')->with('pay', $pay);
    })->name('changepay');
    Route::post('/post/payment', [PaymentController::class, 'edit'])->name('changepayment');
    Route::get('/approve/employer', function () {
        // $users = User::where('request_admin', 1)->where('dont_show', 0)->paginate(27);
        $users = User::where('request_admin', 1)->where('dont_show', 0)->paginate(27);

        return view('admin.request')->with('users', $users);
    })->name('requestadmin');

    Route::get('/employer/details/{id}', function ($id) {
        $users = User::where('id', $id)->first();
        return view('admin.viewdetails')->with('users', $users);
    })->name('employerdata');

    Route::get('/approveemployer/{id}', [EmployerController::class, 'approve'])->name('approveemployer');
    Route::get('/contacts/frontend', function () {
        $users = Contact::paginate(27);
        return view('admin.contatcs')->with('users', $users);
    });
    Route::post('/ignore/user/{id}', [EmployerController::class, 'ignore'])->name('ignoreuser');
    Route::get('/employer/list', function () {
        // $users = User::where('request_admin', 1)->where('dont_show', 0)->paginate(27);
        $users = User::where('request_admin', 0)->where('is_admin', 1)->where('dont_show', 0)->paginate(27);

        return view('admin.employerslist')->with('users', $users);
    })->name('list');


    Route::get('/paid/using/coupons', function () {
        $users = Application::where('is_coupon_code_applied', 1)->paginate(27);
        return view('admin.couponsapplied')->with('users', $users);
    })->name('paidusing');

    Route::get('/paid/coupon/count/{id}', function ($id) {
        $users = Coupon::where('id', $id)->first();
        return view('admin.count')->with('users', $users);
    })->name('couponcount');

    Route::get('/subs', function () {
        $users = Sub::where('id', "!=", 0)->paginate(27);
        return view('admin.createsub')->with('users', $users);
    })->name('craetesub');
    Route::get('/country', function () {
        $users = Country::where('id', "!=", 0)->paginate(27);
        return view('admin.createcountry')->with('users', $users);
    });
    Route::post('/subs', [EmployerController::class, 'addSubs'])->name('test');
    Route::post('/country', function() {
        // add new coountry
        $country = new Country;
        $country->name = request('name');
        $country->save();
        return redirect()->back();
    });

    Route::get('/delete/country/{id}', function($id) {
        // delte country
        $country = Country::where('id', $id)->first();
        $country->delete();
        return redirect()->back();
    });

    Route::get('/delete/subs/{id}', [EmployerController::class, 'deleteSubs'])->name('test2');
});

// edit/application
Route::get('/edit/application/', function () {
    return view('editapplication');
});
