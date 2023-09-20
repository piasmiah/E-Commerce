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
                ->with('success', 'OTP has been sent!!');
        } else {

            return redirect()->back()->with('error', 'User or OTP record not found.');
        }
    }

    public function OTPGEN($mobile)
    {
        $user = User::where('Phone', $mobile)->first();

        if (!$user) {
            // Handle the case when the user is not found.
            // You can return an error message or perform other actions.
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
    public function dataInsert(Request $request)
    {
        $name = $request->input('names');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $password = $request->input('password');

        $hashedPassword = bcrypt($password);

        $data = User::insert([
            'name'=>$name,
            'Phone'=>$phone,
            'email'=>$email,
            'password'=>$hashedPassword
        ]);

        if($data)
        {
            $user = DB::table('users')
                ->where('email', $request->input('email'))
                ->first();
            if ($user && Hash::check($request->input('password'), $user->password)) {
                event(new Registered($user));
                return redirect()->route('dashboard', ['id' => $user->id]);
            }
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
        if($user && Hash::check($password, $user->password) || $password === $user->password)
        {

            return redirect()->route('dashboard', ['id' => $user->id]);
        }

        if ($request->input('email') === 'addadmin@gmail.com' && $request->input('password') === 'admin')
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

    public function product(){
        $product = Product::limit(4)->get();

        return view('welcome', compact('product'));
    }

    public function purchase($id)
    {
        $id = User::find($id);
        $see = DB::table('orderstatus')
            ->where('customer_id',$id->id)
            ->where('order_status','Delivered')
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
