<?php

namespace App\Http\Controllers;

use App\Models\PendingOrder;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use App\Models\UserOtp;
use Illuminate\Validation\Validate;
use Twilio\Rest\Client;

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
        $password = $request->input('password');
        $confirm = $request->input('confirm-password');

        $existingUser = User::where('email', $email)->first();
        $hashedPassword = bcrypt($password);

        if ($password !== $confirm || $existingUser) {
            $messages = [];

            if ($password !== $confirm) {
                $messages[] = 'Password did not match';
            }

            if ($existingUser) {
                $messages[] = 'Email Already Exists';
            }

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
                    'password' => $hashedPassword
                ]);

                if ($data) {
                    $user = DB::table('users')
                        ->where('email', $request->input('email'))
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
            ->where('email',$email)

            ->first();
//        event(new Registered($user));
        if($user && Hash::check($password, $user->password))
        {

            return redirect()->route('dashboard', ['id' => $user->id]);
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
        else
        {
            return redirect()->back()->with('error', 'Please check your credentials first!!!');
        }
    }

    public function showDashboard($id)
    {
        $user=User::find($id);
        $product = Product::limit(4)->get();
        $total = DB::table('orderstatus')
            ->where('customer_id',$user->id)
            ->whereIn('order_status', ['Pending', 'Shipping'])
            ->count();
        if ($user) {
            return view('dashboard', compact('user','product','total'));
        } else {

        }
    }

    public function showUs($id){
        $user = User::find($id);
        return view('aboutus',compact('user'));
    }

    public function product(){
        $product = Product::latest()->inRandomOrder()->limit(4)->get();
        $product2 = Product::inRandomOrder()->limit(4)->get();
        return view('welcome', compact('product','product2'));
    }

    public function purchase($id,Request $request)
    {
        $id = User::find($id);
        $see = DB::table('orderstatus')
            ->join('product', 'orderstatus.product_id', '=', 'product.pro_id')
            ->where('orderstatus.customer_id', $id->id)
            ->where('orderstatus.order_status', 'Delivered')
            ->select('orderstatus.*', 'product.pro_pic', 'product.pro_name', 'product.Price')
            ->get();



        return view('purchase',['id'=>$id,'see'=>$see]);
    }

    public function paymentoption($id)
    {
        $user = User::find($id);

        $total = PendingOrder::where('customer_id',$id)->where('order_status','Pending')->sum('price');

        return view('payment',['total'=>$total,'user'=>$user]);
    }

    public function payment(Request $request)
    {
        DB::table('orderstatus')
            ->where('customer_id',$request->input('id'))
            ->where('order_status','Pending')
            ->update([
                'Payment'=>$request->input('paymentMethod'),
                'order_status'=>'Shipping',
                'Payment_Status'=>'paid',
            ]);

        return redirect()->route('dashboard',['id'=>$request->input('id')]);
    }



}
