<?php

namespace App\Http\Controllers;

use App\Models\PendingOrder;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Diff\Exception;
use Carbon\Carbon;

class OrderControll extends Controller
{
    public function pendingorder(Request $request)
    {
        $id = $request->input('ids'); // No need to use $id->id here
        $name = $request->input('name');
        $pro_id = $request->input('id');
        $pro_name = $request->input('des');
        $price = $request->input('price');// Correct variable name


        $insert = PendingOrder::insert([
            'customer_id' => $id, // Use the direct value here
            'customer_name' => $name,
            'product_id' => $pro_id,
            'products' => $pro_name,
            'Price' => $price
        ]);

        if ($insert) {

            return redirect()->route('dashboard', ['id' => $id]); // No need for $id->id here
        }
    }

    public function orders(Request $request)
    {
        $id = $request->input('ids');
        $cusid = $request->input('id');
        $name = $request->input('name');
        $loc = $request->input('loc');
        $proname = $request->input('pro_name');
        $quantity = $request->input('quantity');
        $price = $request->input('total_price');
        $status =$request->input('status');
        $currentDate = Carbon::now();

        $isInsert = PendingOrder::insert([
           'product_id'=>$id,
            'customer_id'=>$cusid,
            'customer_name'=>$name,
            'location' => $loc,
            'products'=>$proname,
            'Quantity'=>$quantity,
            'Price'=>$price,
            'order_status'=>$status,
            'Date'=>$currentDate
        ]);
        if($isInsert) {
            return redirect()->route('dashboard', ['id' => $cusid]);
        }
    }

    public function order($id,$ids)
    {
        return view('product', [
            'id' => $id,
            'ids'=>$ids
        ]);
    }

    public function addtocart($id,$ids)
    {
        $id=Product::find($id);
        $ids=User::find($ids);
        $show = DB::table('product')
            ->where('pro_id',$id->pro_id)
            ->first();
        $user = DB::table('users')
            ->where('id',$ids->id)
            ->first();
        return view('product',['id'=>$id,'ids'=>$ids,'show'=>$show,'user'=>$user]);

    }

    public function deleteorder($id,Request $request)
    {
        $id = User::find($id);

        $orderIdsToDelete = $request->input('orid');


            DB::table('orderstatus')

                ->where('order_id', $orderIdsToDelete)
                ->delete();


        return redirect()->route('dashboard',['id'=>$id]);
    }

//    public function seeorder()
//    {
//        $order = DB::table('orderstatus')
//            ->where('order_status','Pending')
//            ->get();
//
//        return view('pending',['order'=>$order]);
//    }

    public function pendorder(Request $request)
    {
        $order = DB::table('orderstatus')

            ->get();
        return view('pend',['order'=>$order]);
    }

    public function updateship(Request $request)
    {
        $update = DB::table('orderstatus')
            ->where('order_id',$request->input('id'))
            ->where('customer_id',$request->input('ids'))
            ->update([
                'order_status'=>$request->input('status'),
            ]);

        return redirect()->route('pend');
    }

    public function search(Request $request)
    {
        $query = DB::table('orderstatus');

        if ($request->has('search_location')) {
            $searchLocation = $request->input('search_location');
            $query->where('location', 'like', '%' . $searchLocation . '%');
        }

        $order = $query->get();

        return view('pend', compact('order'));
    }

    public function seeship()
    {
        $order=DB::table('orderstatus')

            ->get();

        return view('deliver',['order'=>$order]);
    }


    public function deliver(Request $request)
    {
        try {
            $update = DB::table('orderstatus')
                ->where('order_id', $request->input('id'))
                ->where('customer_id', $request->input('ids'))
                ->update([
                    'order_status' => $request->input('status'),
                ]);

            $update2 = DB::table('product')
                ->where('pro_id', $request->input('pro_id'))
                ->increment('Quantity_Sold', $request->input('quan'));

            return redirect()->route('deliver');
        }
        catch (\Exception $e){

        }
    }

}
