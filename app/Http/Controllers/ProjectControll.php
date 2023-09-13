<?php

namespace App\Http\Controllers;

use App\Models\PendingOrder;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;

class ProjectControll extends Controller
{
    // public function insert(Request $request)
    // {
    //     $name = $request->input('name');
    //     $email = $request->input('email');
    //     $password = $request->input('password');

    //     $insertdata=User::insert([
    //         'name'=>$name,
    //         'email'=>$email,
    //         'password'=>$password,
    //     ]);

    //     if($insertdata){

    //         return redirect('login');
    //     }
    //     else{
    //         return redirect('/');
    //     }
    // }

    public function dataInsert(Request $request)
    {
        $name = $request->input('names');
        $email = $request->input('email');
        $password = $request->input('password');

        $data = User::insert([
            'name'=>$name,
            'email'=>$email,
            'password'=>$password
        ]);

        if($data)
        {
            $user = DB::table('users')
            ->where('email',$request->input('email'))
            ->where('password',$request->input('password'))
            ->first();
            if($user)
            {
                return redirect()->route('dashboard', ['id' => $user->id]);
            }
        }
    }

    public function login(Request $request)
    {
        $user = DB::table('users')
            ->where('email',$request->input('email'))
            ->where('password',$request->input('password'))
            ->first();

        if($user)
        {
            event(new Registered($user));
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
        $product = Product::all();
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
