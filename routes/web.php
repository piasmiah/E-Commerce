<?php

use App\Http\Controllers\ProjectControll;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('/');


Route::get('/forget', function () {
    return view('forget');
})->name('password.request');

Route::post('/forget', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->name('password.email');

Route::get('/reset/{token}', function (string $token) {
    return view('reset', ['token' => $token]);
})->name('password.reset');

Route::post('/reset', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => $password, // Do not hash the password
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->name('password.update');

Route::get('/email/verify', function () {
    return view('verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('registration');
})->name('register');

// Route::post('/form-container',[\App\Http\Controllers\ProjectControll::class,'insert'])->name('form-container');

Route::post('/insertion',[ProjectControll::class,'dataInsert'])->name('insertion');

Route::post('/form-container',[\App\Http\Controllers\ProjectControll::class,'login'])->name('form-container');

Route::get('/dashboard/{id}', function ($id) {
    return view('dashboard', ['userId' => $id]);
})->name('dashboard')->middleware(['verified']);

Route::get('/dashboard/{id}',[\App\Http\Controllers\ProjectControll::class,'showDashboard'])->name('dashboard');

Route::get('/maintainadmin', function () {
    return view('maintainadmin');
})->name('maintainadmin');

Route::post('/product-form',[\App\Http\Controllers\ProductControll::class,'storeProduct'])->name('product-form');

Route::get('/maintainadmin',[\App\Http\Controllers\ProductControll::class,'showproduct'])->name('maintainadmin');

Route::get('/',[\App\Http\Controllers\ProjectControll::class,'product'])->name('/');

Route::post('/oder',[\App\Http\Controllers\OrderControll::class,'pendingorder'])->name('order');

Route::get('/cart/{id}', function ($id) {
    $user = User::find($id);

    $orders = DB::table('orderstatus')
        ->where('customer_id', $user->id)
        ->whereIn('order_status', ['Pending', 'Shipping'])
        ->get();

    $total = $orders->count();
    $paymentstatus = DB::table('orderstatus')
        ->where('customer_id', $user->id)
        ->get();

    $loc = DB::table('orderstatus')
        ->where('customer_id', $user->id)
        ->first();

    return view('cart', ['user' => $user, 'total' => $total, 'orders' => $orders,'paymentstatus' => $paymentstatus,'loc'=>$loc]);
})->name('cart');

Route::post('/insertorder/{id}',[\App\Http\Controllers\OrderControll::class,'orders'])->name('insertorder');
//Route::get('/cart/{id}',[\App\Http\Controllers\OrderControll::class,'orders'])->name('cart');

Route::get('/product/{id}/{ids}', [\App\Http\Controllers\OrderControll::class, 'order'])->name('product');

Route::get('/product/{id}/{ids}', [\App\Http\Controllers\OrderControll::class, 'addtocart'])->name('product');

Route::post('/delete/{id}',[\App\Http\Controllers\OrderControll::class,'deleteorder'])->name('delete');

Route::get('/pend', function () {
    return view('pend');
})->name('pend');

Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Route::get('/admin',[\App\Http\Controllers\Admin::class,'totalsell'])->name('admin');

Route::get('/pend',[\App\Http\Controllers\OrderControll::class,'pendorder'])->name('pend');

Route::post('updates',[\App\Http\Controllers\OrderControll::class,'updateship'])->name('updates');

Route::get('pending', [\App\Http\Controllers\OrderControll::class, 'search'])->name('pending');

Route::get('/deliver', function () {
    return view('deliver');
})->name('deliver');

Route::get('/invoice', function () {
    return view('invoice');
})->name('invoice');

Route::get('/invoice/{id}',[\App\Http\Controllers\Invoice::class,'invo'])->name('invoice');

Route::post('/generate-invoice', [\App\Http\Controllers\Invoice::class, 'generateInvoice'])->name('generate-invoice');

Route::get('/totalsells', function () {
    return view('totalsells');
})->name('totalsells');

Route::get('/totalsells',[\App\Http\Controllers\Admin::class,'totalsellsreport'])->name('totalsells');

Route::get('/deliver',[\App\Http\Controllers\OrderControll::class,'seeship'])->name('deliver');

Route::post('update',[\App\Http\Controllers\OrderControll::class,'deliver'])->name('update');

Route::get('/purchase/{id}', function () {
    return view('purchase');
})->name('purchase');

Route::get('/purchase/{id}',[\App\Http\Controllers\ProjectControll::class,'purchase'])->name('purchase');

Route::post('/payment/{id}',[\App\Http\Controllers\ProjectControll::class,'payment'])->name('payment');

Route::get('/payment/{id}', function () {
    return view('payment');
})->name('payment');

Route::get('/payment/{id}',[\App\Http\Controllers\ProjectControll::class,'paymentoption'])->name('payment');

Route::post('/donepayment',[\App\Http\Controllers\ProjectControll::class,'payment'])->name('donepayment');

Route::post('/updatep',[\App\Http\Controllers\ProductControll::class,'updateprod'])->name('updatep');

Route::get('/otp/login',[ProjectControll::class,'otpcontrol'])->name('otp.login');

Route::post('/otp/generate',[ProjectControll::class,'otpgenerate'])->name('otp.generate');

Route::get('/otp/verification/{id}',[ProjectControll::class,'verify'])->name('otp.verification');
