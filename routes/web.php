<?php

use App\Http\Controllers\ProjectControll;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
})->name('dashboard');

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
