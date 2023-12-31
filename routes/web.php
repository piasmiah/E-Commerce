<?php

use App\Http\Controllers\ProjectControll;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Twilio\TwiML\Video\Room;

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

Route::get('/aboutus/{id}',[ProjectControll::class,'showUs'])->name('aboutus');

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

Route::get('/login',[ProjectControll::class,'loginshow'])->name('login');

Route::get('/registration',[ProjectControll::class,'registrationshow'])->name('register');

// Route::post('/form-container',[\App\Http\Controllers\ProjectControll::class,'insert'])->name('form-container');

Route::post('/insertion',[ProjectControll::class,'dataInsert'])->name('insertion');

Route::post('/form-container',[\App\Http\Controllers\ProjectControll::class,'login'])->name('form-container');

Route::get('/dashboard/{id}', function ($id) {
    return view('dashboard', ['userId' => $id]);
})->name('dashboard')->middleware(['verified']);

Route::middleware(['web', 'logout'])->group(function (){
    Route::get('/dashboard/{id}',[\App\Http\Controllers\ProjectControll::class,'showDashboard'])->name('dashboard');
});

Route::get('/maintainadmin', function () {
    return view('maintainadmin');
})->name('maintainadmin');

Route::post('/product-form',[\App\Http\Controllers\ProductControll::class,'storeProduct'])->name('product-form');

Route::get('/maintainadmin',[\App\Http\Controllers\ProductControll::class,'showproduct'])->name('maintainadmin');

Route::post('/getSubcategories/',[\App\Http\Controllers\ProductControll::class,'getProductsByCategory']);


Route::get('/',[\App\Http\Controllers\ProjectControll::class,'product'])->name('/');

Route::post('/oder',[\App\Http\Controllers\OrderControll::class,'pendingorder'])->name('order');

Route::get('/cart/{id}',[ProjectControll::class,'cartView'])->name('cart');

Route::get('/cart2/{id}', function ($id) {
    $user = User::find($id);

    $orders = DB::table('orderstatus')
        ->where('customer_id', $user->id)
        ->where('order_status', 'Pending')
        ->get();

    $total = $orders->count();
    $paymentstatus = DB::table('orderstatus')
        ->where('customer_id', $user->id)
        ->get();

    $loc = DB::table('orderstatus')
        ->where('customer_id', $user->id)
        ->first();

    return view('cart2', ['user' => $user, 'total' => $total, 'orders' => $orders,'paymentstatus' => $paymentstatus,'loc'=>$loc]);
})->name('cart2');

Route::post('/insertorder/{id}',[\App\Http\Controllers\OrderControll::class,'orders'])->name('insertorder');

Route::post('/insertorder2/{id}',[\App\Http\Controllers\OrderControll::class,'orders2'])->name('insertorder2');
//Route::get('/cart/{id}',[\App\Http\Controllers\OrderControll::class,'orders'])->name('cart');

//Route::get('/product/{id}/{ids}', [\App\Http\Controllers\OrderControll::class, 'order'])->name('product');

Route::get('/product/productid/{id}/userid/{ids}/product/{category}', [\App\Http\Controllers\OrderControll::class, 'addtocart'])->name('product');

Route::get('/product2/productid/{id}/userid/{ids}/product/{category}', [\App\Http\Controllers\OrderControll::class, 'addtocart2'])->name('product2');


Route::post('/comment/{id}', [\App\Http\Controllers\OrderControll::class, 'commentrating'])->name('comment');


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

Route::get('/aboutuser',[ProjectControll::class,'showAbout'])->name('aboutuser');

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

Route::get('/productlist/{category}',[ProjectControll::class,'showProductList'])->name('productlist');

//Route::get('/{id}/productlist2/{category}',[\App\Http\Controllers\ProductControll::class,'showProductList2'])->name('productlist2');
Route::get('/{id}/productlist2/{category}',[\App\Http\Controllers\ProductControll::class,'showProductList2'])->name('productlist2');

Route::get('/payment/{id}',[\App\Http\Controllers\ProjectControll::class,'paymentoption'])->name('payment');

Route::post('/donepayment',[\App\Http\Controllers\ProjectControll::class,'payment'])->name('donepayment');

Route::post('/updatep',[\App\Http\Controllers\ProductControll::class,'updateprod'])->name('updatep');

Route::get('/otp/login', [ProjectControll::class, 'otpcontrol'])->name('otp.login');
Route::post('/otp/generate', [ProjectControll::class, 'otpgenerate'])->name('otp.generate');
Route::get('/otp/verification/{id}', [ProjectControll::class, 'verify'])->name('otp.verification');
Route::post('/otp/login', [ProjectControll::class, 'loginOTP'])->name('otp.getLogin');

Route::get('/show-chart',[\App\Http\Controllers\Chart::class,'load'])->name('show-chart');

Route::post('/updatepro',[\App\Http\Controllers\ProductControll::class,'update'])->name('updatepro');

Route::post('/subscribe',[ProjectControll::class,'subscriber'])->name('subscribe');

Route::post('/subscribes/{id}',[ProjectControll::class,'subscriber2'])->name('subscribes');

Route::post('/ctegory',[\App\Http\Controllers\Admin::class,'addcategory'])->name('ctegory');

Route::post('/updateCata',[\App\Http\Controllers\ProductControll::class,'updateCategory'])->name('updateCata');

Route::post('/discount',[ProjectControll::class,'discountoffer'])->name('discount');

Route::post('/updatediscount',[ProjectControll::class,'updateDiscount'])->name('updatediscount');

//    Route::get('/logout', function() {
//        return redirect('/');
//    })->name('logout');

Route::get('/admin/One_Month_Report', function () {
    return view('report');
})->name('report');

Route::get('/admin/Daily_Update_Report', function () {
    return view('report2');
})->name('report2');

Route::get('/welcome/Contact_Us', [ProjectControll::class,'showContact'])->name('contactus');

Route::get('/welcome/Contact/{id}', [ProjectControll::class,'showContact2'])->name('contactus2');

Route::post('/approval',[\App\Http\Controllers\Admin::class,'approval'])->name('approval');

Route::middleware([\App\Http\Middleware\TrackVisitors::class])->group(function () {
    Route::get('/admin/One_Month_Report', [\App\Http\Controllers\Report::class, 'reportTotal'])->name('report');
});

Route::get('/admin/Daily_Update_Report', [\App\Http\Controllers\Report::class, 'reportTotal2'])->name('report2');

Route::get('/allproduct/',[ProjectControll::class,'searchProduct'])->name('allproduct');

Route::get('/{id}/allproduct2/',[ProjectControll::class,'searchProduct2'])->name('allproduct2');

Route::get('/delivaryboy/{id}', function ($id) {
    return view('delivaryboy', ['userId' => $id]);
})->name('delivaryboy');

Route::get('/delivaryboy/{id}',[\App\Http\Controllers\DelivaryBoy::class,'showDelivary'])->name('delivaryboy');

Route::get('/delivaryregistration',[ProjectControll::class,'delivaryregistration'])->name('delivaryregistration');

Route::get('/getProduct5', [ProjectControll::class, 'getProduct5'])->name('getProduct5');
Route::post('/delivar',[\App\Http\Controllers\DelivaryBoy::class,'delivary'])->name('delivar');

Route::post('/updatedelivar/{id}',[\App\Http\Controllers\DelivaryBoy::class,'updateDelivary'])->name('updatedelivar');

Route::post('/infoupdate/{id}',[\App\Http\Controllers\DelivaryBoy::class,'updateInfo'])->name('infoupdate');

Route::get('/sellerregistration', function () {
    return view('sellerregistration');
})->name('sellerregistration');

Route::get('/userprofile/{id}',[ProjectControll::class,'userPrfile'])->name('userprofile');

Route::get('/sellerregistration',[\App\Http\Controllers\SellerController::class,'sellerregistrationpage'])->name('sellerregistration');

Route::post('/sellerinsert',[\App\Http\Controllers\SellerController::class,'sellerregister'])->name('sellerinsert');

Route::post('/approved',[\App\Http\Controllers\Admin::class,'approval2'])->name('approved');

Route::get('/sellerhomepage/{id}', function ($id) {
    return view('sellerhomepage', ['userId' => $id]);
})->name('sellerhomepage');

Route::get('/sellerhomepage/{id}',[\App\Http\Controllers\SellerController::class,'showDashboard'])->name('sellerhomepage');

Route::post('/add',[\App\Http\Controllers\SellerController::class,'addproduct'])->name('add');

Route::get('/sellerproduct/{id}/{category}',[\App\Http\Controllers\SellerController::class,'showList'])->name('sellerproduct');

Route::get('/addproduct/{id}/',[\App\Http\Controllers\SellerController::class,'showAddProduct'])->name('addproduct');

Route::get('/sellertotalsells/{id}/',[\App\Http\Controllers\SellerController::class,'totalsells'])->name('sellertotalsells');

Route::get('/dailyupdate/{id}/',[\App\Http\Controllers\SellerController::class,'dailyupdate'])->name('dailyupdate');

Route::get('/monthly/{id}/',[\App\Http\Controllers\SellerController::class,'monthly'])->name('monthly');

Route::get('/sellermanage/{id}',[\App\Http\Controllers\SellerController::class,'manageProduct'])->name('sellermanage');

Route::post('/sellerproducts/',[\App\Http\Controllers\SellerController::class,'updateproduct'])->name('sellerproducts');

Route::get('/sellerprofile/{id}',[\App\Http\Controllers\SellerController::class,'sellerprofile'])->name('sellerprofile');

Route::post('/sellerprofileupdate/{id}',[\App\Http\Controllers\SellerController::class,'sellerprofileupdate'])->name('sellerprofileupdate');

Route::get('/termsandcondition', function () {
    return view('termsandcondition');
})->name('termsandcondition');

Route::get('/termsandcondition',[ProjectControll::class,'termsandcondition'])->name('termsandcondition');

Route::get('/privacypolicy',[ProjectControll::class,'privacypolicy'])->name('privacypolicy');

Route::get('/sitemap/{id}',[ProjectControll::class,'sitemap'])->name('sitemap');

Route::get('/sellsomething/{id}',[\App\Http\Controllers\SellSomething::class,'showSell'])->name('sellsomething');

Route::get('/postanadd/{id}',[\App\Http\Controllers\SellSomething::class,'showPostADD'])->name('postanadd');

Route::post('/posts/{id}',[\App\Http\Controllers\SellSomething::class,'post'])->name('posts');

Route::get('/yourprducts/{id}',[\App\Http\Controllers\SellSomething::class,'yourpro'])->name('yourprducts');

Route::post('/cancelition/{id}',[\App\Http\Controllers\SellSomething::class,'cancel'])->name('cancelition');

Route::get('/payfile/{id}/{pro}',[\App\Http\Controllers\SellSomething::class,'pay'])->name('payfile');

Route::post('/donepaym/{id}',[\App\Http\Controllers\SellSomething::class,'donepay'])->name('donepaym');
