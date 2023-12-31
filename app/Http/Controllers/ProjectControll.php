<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\CommentRating;
use App\Models\Discount;
use App\Models\PendingOrder;
use App\Models\Product;
use App\Models\Subscriber;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use App\Models\UserOtp;
use Illuminate\Validation\Validate;
use Twilio\Rest\Client;
use App\Models\TimerTask;
use Illuminate\Support\Facades\Session;

class ProjectControll extends Controller
{
    public function otpcontrol()
    {
        return view('otps');
    }

    public function otpgenerate(Request $request)
    {
        $request->validate([
            'mobile' => 'required|exists:users,Phone'
        ]);

        $user2 = $this->OTPGEN($request->mobile);

        if ($user2) {
            $user2->sendSMS($request->mobile);

            return redirect()->route('otp.verification', ['id' => $user2->user_id])
                ->with('success', 'We sent an OTP to your mobile number.');
        } else {

            return redirect()->back()->with('error', 'User or OTP record not found.');
        }
    }

    public function OTPGEN($mobile)
    {
        $user = User::where('Phone', $mobile)->first();

        if (!$user) {
            return null;
        }

        $user2 = UserOtp::where('user_id', $user->id)->latest()->first();

        $now = now();
        if ($user2 && $now->isBefore($user2->expire_at)) {
            return $user2;
        }

        $otpRecord = UserOtp::create([
            'user_id' => $user->id,
            'otp' => rand(12345, 99999),
            'expire_at' => $now->addMinutes(3)
        ]);

        return $otpRecord;

    }

    public function verify($id)
    {
        return view('verification')
            ->with(['user_id'=>$id]);
    }

    public function loginOTP(Request $request)
    {
        $request->validate([
            'otp' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);

        $userOtp = UserOtp::where('user_id', $request->user_id)
            ->where('otp', $request->otp)
            ->where('expire_at', '>', now())
            ->first();

        if (!$userOtp) {
            return redirect()->route('otp.login')->with('error', 'Invalid OTP or OTP expired.');
        }

        $userOtp->update(['expire_at' => now()]);


        return redirect()->route('dashboard',['id'=>$request->user_id]);
    }

    public function dataInsert(Request $request)
    {
        $name = $request->input('names');
        $phone = $request->input('phone');
        $nid = $request->input('nid');
        $email = $request->input('email');
        $userId = $request->input('userid');
        $password = $request->input('password');
        $confirm = $request->input('confirm-password');

        $existingUser = User::where('email', $email)->first();
            $existingUser2 = User::where('username',$userId)->first();

        $hashedPassword = bcrypt($password);

        if ($password !== $confirm || $existingUser) {
            $messages = [];

            if ($password !== $confirm) {
                $messages[] = 'Password did not match!';
            }

            if ($existingUser) {
                $messages[] = 'Email Already Exists!';
            }

            if ($existingUser2) {
                $messages[] = 'Username Already Exists!';
            }

            Session::flash('messages', $messages);

            return redirect()->back()->with('messages', $messages);
        }

        else {
            if($password === $confirm)
            {
                $data = User::insert([
                    'name' => $name,
                    'Phone' => $phone,
                    'NID' => $nid,
                    'email' => $email,
                    'username'=>$userId,
                    'password' => $hashedPassword
                ]);

                if ($data) {
                    $user = DB::table('users')
                        ->where('username', $request->input('userid'))
                        ->first();
                    if ($user && Hash::check($request->input('password'), $user->password)) {
                        event(new Registered($user));

                        $user2 = $this->OTPGEN($phone);
                        if ($user2) {
                            $user2->sendSMS($phone);
                            return redirect()->route('otp.verification', ['id' => $user2->user_id]);
                        }

                        return redirect()->route('dashboard', ['id' => $user->id]);
                    }
                }
            }

            return response()->json(['message' => 'Registration successful'], 200);
        }
    }
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = DB::table('users')
            ->where('username',$email)
            ->first();

        $user2 = DB::table('delivary')
            ->where('email',$email)
            ->where('approval','Approved')
            ->first();

        $user3 = DB::table('selleraccount')
            ->where('username',$email)
            ->where('approval','Approved')
            ->first();
//        event(new Registered($user));
        if($user && Hash::check($password, $user->password) && $user->email)
        {
            return redirect()->route('dashboard', ['id' => $user->id]);
        }
        elseif ($user2 && ($user2->password))
        {
            return redirect()->route('delivaryboy', ['id' => $user2->id]);
        }

        elseif ($user3 && ($user3->password))
        {
            return redirect()->route('sellerhomepage', ['id' => $user3->seller_id]);
        }

        elseif($request->input('email') === 'addadmin@gmail.com' && $request->input('password') === 'admin')
        {
            return redirect('maintainadmin');
        }

        elseif ($request->input('email') === 'pendingadmin@gmail.com' && $request->input('password') === 'admin')
        {
            return redirect('pend');
        }

        elseif ($request->input('email') === 'deliveradmin@gmail.com' && $request->input('password') === 'admin')
        {
            return redirect('deliver');
        }
        elseif ($request->input('email') === 'admin@gmail.com' && $request->input('password') === 'admin')
        {
            return redirect('admin');
        }
        elseif ($user2 && $user2->approval === 'Pending')
        {
            return redirect()->back()->with('info' , 'Your profile is not approved by admin!!');
        }
        else
        {
            return redirect()->back()->withErrors(['error' => 'Please check your credentials first!!!']);
        }
    }

    public function showDashboard($id)
    {
        $user=User::find($id);
        $product = Product::latest()->inRandomOrder()->limit(4)->get();
        $product2 = Product::inRandomOrder()->limit(4)->get();
        $product4 = Product::select('product.*', 'discount_offer.Discount_Rate')
            ->leftJoin('discount_offer', 'product.category', '=', 'discount_offer.Name')
            ->latest()
            ->inRandomOrder()
            ->paginate(16);

        $upcoming = Product::where('date_status','upcoming')
            ->latest()->inRandomOrder()->limit(4)->get();

        $upcoming2 = Product::where('date_status','upcoming')
            ->inRandomOrder()->limit(4)->get();

        $averageRatings = [];

        foreach ($product4 as $prod) {
            $ratings = CommentRating::where('item_id', $prod->pro_id)->pluck('rating');

            if ($ratings->isNotEmpty()) {
                $averageRatings[$prod->pro_id] = $ratings->avg();
            } else {
                $averageRatings[$prod->pro_id] = 0; // No ratings available, set the average to 0.
            }
        }

//        $averageRating = $product4->avg('rating');
        $category = Categories::get();

        $trending_products = DB::table('product')
            ->where('Quantity_Sold', '>', 2)  // Order by sales count in descending order
            ->limit(4) // Get the top 5 trending products
            ->get();

        $dealoftheDay = DB::table('product')
            ->where('date_status','!=','upcoming')
            ->inRandomOrder() // Get the top 5 trending products
            ->first();
        $dealoftheDay2 = DB::table('product')
            ->where('date_status','!=','upcoming')
            ->inRandomOrder() // Get the top 5 trending products
            ->first();

        $special_offers = DB::table('product')
            ->join('discount_offer', 'discount_offer.Name', '=', 'product.category')
            ->where('date_status', '!=', 'upcoming')
            ->inRandomOrder()->limit(4)
            ->select('product.*', 'discount_offer.*')
            ->get();

        $special_offers2 = DB::table('product')
            ->join('discount_offer', 'discount_offer.Name', '=', 'product.category')
            ->where('date_status', '!=', 'upcoming')
            ->inRandomOrder()->limit(4)
            ->select('product.*', 'discount_offer.*')
            ->get();

        $product3 = DB::table('orderstatus')
            ->join('product', 'orderstatus.product_id', '=', 'product.pro_id')
            ->where('orderstatus.order_status', 'Delivered')
            ->orderBy('orderstatus.created_at', 'desc') // Order by the creation time in descending order
            ->select('product.pro_pic', 'product.pro_des', 'orderstatus.*')
            ->first();

        $subscribe = Subscriber::all();
        $total = DB::table('orderstatus')
            ->where('customer_id',$user->id)
            ->whereIn('order_status', ['Pending'])
            ->count();

        $userfind = PendingOrder::where('customer_id',$user->id)->first();

        if ($user) {
            return view('dashboard', compact('user','trending_products','dealoftheDay','dealoftheDay2','special_offers','upcoming','upcoming2','userfind','averageRatings','product','category','product4','product2','product3','total','subscribe'));
        } else {

        }
    }

    public function showUs($id){
        $user = User::find($id);
        $category = Categories::get();
        $userfind = PendingOrder::where('customer_id',$user->id)->first();
        $total = DB::table('orderstatus')
            ->where('customer_id',$user->id)
            ->whereIn('order_status', ['Pending', 'Shipping'])
            ->count();
        return view('aboutus',compact('user','category','userfind','total'));
    }

    public function userPrfile($id){
        $user = User::find($id);
        $category = Categories::get();
        $total = DB::table('orderstatus')
            ->where('customer_id',$user->id)
            ->whereIn('order_status', ['Pending', 'Shipping'])
            ->count();
        return view('userprofile',compact('user','category','total'));
    }

    public function product(Request $request){
        $product = Product::latest()->inRandomOrder()->limit(4)->get();
        $product2 = Product::inRandomOrder()->limit(4)->get();
        $product4 = Product::orderby('created_at','asc')->paginate(16);



        $upcoming = Product::where('date_status','upcoming')
            ->latest()->inRandomOrder()->limit(4)->get();

        $upcoming2 = Product::where('date_status','upcoming')
            ->inRandomOrder()->limit(4)->get();

        $dealoftheDay = DB::table('product')
            ->where('date_status','!=','upcoming')
            ->inRandomOrder() // Get the top 5 trending products
            ->first();
        $dealoftheDay2 = DB::table('product')
            ->where('date_status','!=','upcoming')
            ->orderBy('pro_name','asc')
            ->inRandomOrder() // Get the top 5 trending products
            ->first();


        $product5 = Product::inRandomOrder()->limit(2)->get();
        $category = Categories::get();
        $averageRatings = [];

        foreach ($product4 as $prod) {
            $ratings = CommentRating::where('item_id', $prod->pro_id)->pluck('rating');

            if ($ratings->isNotEmpty()) {
                $averageRatings[$prod->pro_id] = $ratings->avg();
            } else {
                $averageRatings[$prod->pro_id] = 0; // No ratings available, set the average to 0.
            }
        }
        $category2 = Categories::first();

        $trending_products = DB::table('product')
             // Considering only live products
            ->where('Quantity_Sold', '>', 2)  // Order by sales count in descending order
            ->limit(4) // Get the top 5 trending products
            ->get();

        $trending_products2 = DB::table('product')
            // Considering only live products
            ->orderBy('pro_name','asc')
            ->where('Quantity_Sold', '>', 2)  // Order by sales count in descending order
            ->limit(4) // Get the top 5 trending products
            ->get();
        $special_offers = DB::table('product')
            ->join('discount_offer', 'discount_offer.Name', '=', 'product.category')
            ->where('date_status', '!=', 'upcoming')
            ->inRandomOrder()->limit(4)
            ->select('product.*', 'discount_offer.*')
            ->get();

        $special_offers2 = DB::table('product')
            ->join('discount_offer', 'discount_offer.Name', '=', 'product.category')
            ->orderBy('pro_name','asc')
            ->inRandomOrder()->limit(4)
            ->select('product.*', 'discount_offer.*')
            ->where('date_status', '!=', 'upcoming')
            ->get();

        $product3 = DB::table('orderstatus')
            ->join('product', 'orderstatus.product_id', '=', 'product.pro_id')
            ->where('orderstatus.order_status', 'Delivered')
            ->orderBy('orderstatus.created_at', 'desc') // Order by the creation time in descending order
            ->select('product.pro_pic', 'product.pro_des', 'orderstatus.*')
            ->first();

        return view('welcome', compact('product','dealoftheDay','dealoftheDay2','trending_products','trending_products2','special_offers','special_offers2','upcoming','upcoming2','averageRatings','category2','product2','product3','product4','category'));

    }



    public function purchase($id,Request $request)
    {
        $id = User::find($id);
        $category = Categories::get();
        $see = DB::table('orderstatus')
            ->join('product', 'orderstatus.product_id', '=', 'product.pro_id')
            ->where('orderstatus.customer_id', $id->id)
            ->whereIn('orderstatus.order_status', ['Delivered', 'Shipping','Pending','On the Way'])
            ->select('orderstatus.*', 'product.pro_pic', 'product.pro_name', 'product.Price')
            ->orderBy('orderstatus.created_at', 'desc')
            ->paginate(5);

        $see2 = DB::table('orderstatus')
            ->join('sellsome', 'orderstatus.product_id', '=', 'sellsome.id')
            ->where('orderstatus.customer_id', $id->id)
            ->whereIn('orderstatus.order_status', ['Delivered', 'Shipping','Pending','On the Way'])
            ->select('orderstatus.*', 'sellsome.*')
            ->orderBy('orderstatus.created_at', 'desc')
            ->paginate(5);

        $orders = DB::table('orderstatus')
            ->where('customer_id', $id->id)
            ->where('order_status', 'Pending')
            ->count();

        return view('purchase',['id'=>$id,'see'=>$see,'see2'=>$see2,'orders'=>$orders,'category'=>$category]);
    }

    public function cartView($id){
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

        return view('cart', ['user' => $user, 'total' => $total, 'orders' => $orders,'paymentstatus' => $paymentstatus,'loc'=>$loc]);
    }

    public function paymentoption($id)
    {
        $user = User::find($id);

        $total = PendingOrder::where('customer_id',$id)->where('order_status','Pending')->sum('price');

        return view('payment',['total'=>$total,'user'=>$user]);
    }

    public function payment(Request $request)
    {
        $now = Carbon::now();
        DB::table('orderstatus')
            ->where('customer_id',$request->input('id'))
            ->where('order_status','Pending')
            ->update([
                'Payment'=>$request->input('paymentMethod'),
                'Payment_Status'=>'paid',
                'created_at'=>$now->toDateTimeString(),
            ]);

        return redirect()->route('dashboard',['id'=>$request->input('id')]);
    }

    public  function subscriber(Request $request)
    {
//        $id = $request->input('id');
        $email = $request->input('email');
        $time = Carbon::now();

        $subs = Subscriber::insert([
            'Subscriber'=>$email,
            'created_at'=>$time
        ]);
        if ($subs)
            return redirect()->route('/');
//        else
//            return redirect()->route('dashboard',['id'=>$id->id]);
    }

    public  function subscriber2(Request $request,$id)
    {
//        $id = $request->input('id');
        $email = $request->input('email');
        $time = Carbon::now();

        $subs = Subscriber::insert([
            'Subscriber'=>$email,
            'created_at'=>$time
        ]);
        if ($subs)
            return redirect()->route('dashboard',['id'=>$id]);
//
    }

//    public function redirectpage($category)
//    {
//        if ($category === 'Electronic') {
//            $products = Product::where('category', 'Electronic')->get();
//            return redirect()->route('productlist', ['category' => $category])->with('products', $products);
//        }
//    }

    public function showProductList($category, Request $request)
    {
        $products = Product::where('category', $category)->latest()->get();
        $categories = Categories::get();
        $categories2 = Categories::first();

        $search = $request->input('search');


        return view('productlist', compact('category', 'products','categories','categories2'));
    }

    public function redirectpage2($category)
    {
        if ($category === 'Electronic') {


            return redirect()->route('productlist2', ['category' => $category]);
        }
    }

    public function showProductList2($category,$id)
    {
        $user = User::find($id);

        $product = Product::where('category', $category)->latest()->get();

        dd($category, $product);// Retrieve the products data from the session
        return view('productlist2', compact('category', 'product','user'));
    }

    public function discountoffer(Request $request)
    {

            $startDate = Carbon::parse($request->input('startdate'));
            $endDate = Carbon::parse($request->input('enddate'));
            $now = Carbon::now();


                $discountrate = $request->input('discount');

                $discountamount = $discountrate / 100;
                $category = $request->input('category');

                $products = Product::where('category', $category)
                    ->where('date_status','LIVE')
                    ->get();

                foreach ($products as $product) {

                    if ($product->date_status === 'LIVE') {
                        $originalPrice = $product->price;
                        $discountedPrice = $originalPrice - ($originalPrice * $discountamount);


                        $product->Previous_Price = $originalPrice;
                        $product->price = $discountedPrice;
                        $product->save();
                    }
                }


                Discount::insert([
                    'Name' => $category,
                    'Discount_Rate' => $discountrate,
                    'Start_Date' => $startDate->toDateTimeString(),
                    'End_Date' => $endDate->toDateTimeString(),
                    'Activate' => $request->input('radioOption')
                ]);

        return redirect('maintainadmin');
    }

    public function updateDiscount(Request $request)
    {
        $category = $request->input('category');
        $products = Product::where('category', $category)->get();
        foreach ($products as $product) {
            $product->update([
                'price' => $product->Previous_Price,
            ]);
        }
        Discount::where('ID', $request->input('ID'))
            ->update([
                'Activate' => $request->input('radioOption')
            ]);
        return redirect('maintainadmin');
    }


    public function searchProduct(Request $request){
        $search = $request->input('search');


        $products = Product::where('pro_des', 'like', '%' . $search . '%')
            ->get();

        $category = Categories::all();
        if($products){
            return view('allproduct', ['products' => $products,'category'=>$category]);

        }

    }

    public function searchProduct2(Request $request, $id){
        $search = $request->input('search');

        $user2 = User::where('id',$id)->first();

        $products = Product::where('pro_des', 'like', '%' . $search . '%')
            ->get();

        $categories = Categories::get();

            return view('allproduct2', ['products' => $products,'id'=>$user2,'categories'=>$categories]);


    }

    public function loginshow()
    {
        $category = Categories::get();

        return view('login',['category'=>$category]);
    }

    public function registrationshow()
    {
        $category = Categories::get();

        return view('registration',['category'=>$category]);
    }

    public function delivaryregistration()
    {
        $category = Categories::get();

        return view('delivaryregistration',['category'=>$category]);
    }

    public function showAbout(){
        $category = Categories::get();

        return view('aboutuser',['category'=>$category]);
    }

    public function showuseAbout($id)
    {
        $category = Categories::get();


        return view('aboutuser',['category'=>$category]);
    }

    public function showContact(){
        $category = Categories::get();

        return view('contactus',['category'=>$category]);
    }

    public function showContact2($id){

        $user = User::find($id);
        $category = Categories::get();
        $userfind = PendingOrder::where('customer_id',$user->id)->first();

        return view('contact',['category'=>$category,'user'=>$user,'userfind'=>$userfind]);
    }

    public function termsandcondition()
    {
        $category = Categories::all();

        return view('termsandcondition',['category'=>$category]);
    }

    public function privacypolicy()
    {
        $category = Categories::all();

        return view('privacypolicy',['category'=>$category]);
    }

    public function sitemap($id)
    {
        $user = User::find($id);

        $product = Product::all();

        $category = Categories::all();

        $userfind = PendingOrder::where('customer_id',$user->id)->first();

        $total = DB::table('orderstatus')
            ->where('customer_id',$user->id)
            ->whereIn('order_status', ['Pending'])
            ->count();
        return view('sitemap',['id'=>$user,'product'=>$product,'category'=>$category,'userfind'=>$userfind,'total'=>$total]);
    }
}
