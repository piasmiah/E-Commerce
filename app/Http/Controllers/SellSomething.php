<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\PendingOrder;
use App\Models\Sell;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellSomething extends Controller
{
    public function showSell($id){
        $user = User::find($id);

        $category = Categories::all();

        $userfind = PendingOrder::where('customer_id',$user->id)->first();

        $total = DB::table('orderstatus')
            ->where('customer_id',$user->id)
            ->whereIn('order_status', ['Pending'])
            ->count();

        $products2 = Sell::all();

        $product3 = DB::table('orderstatus')
            ->join('product', 'orderstatus.product_id', '=', 'product.pro_id')
            ->where('orderstatus.order_status', 'Delivered')
            ->orderBy('orderstatus.created_at', 'desc') // Order by the creation time in descending order
            ->select('product.pro_pic', 'product.pro_des', 'orderstatus.*')
            ->first();

        return view('sellsomething',['user'=>$user,'product3'=>$product3,'products2'=>$products2,'category'=>$category,'userfind'=>$userfind,'total'=>$total]);
    }

    public function showPostADD($id){
        $user = User::find($id);

        $category = Categories::all();

        $userfind = PendingOrder::where('customer_id',$user->id)->first();

        $total = DB::table('orderstatus')
            ->where('customer_id',$user->id)
            ->whereIn('order_status', ['Pending'])
            ->count();

        $product3 = DB::table('orderstatus')
            ->join('product', 'orderstatus.product_id', '=', 'product.pro_id')
            ->where('orderstatus.order_status', 'Delivered')
            ->orderBy('orderstatus.created_at', 'desc') // Order by the creation time in descending order
            ->select('product.pro_pic', 'product.pro_des', 'orderstatus.*')
            ->first();

        return view('postanadd',['user'=>$user,'product3'=>$product3,'category'=>$category,'userfind'=>$userfind,'total'=>$total]);

    }

    public function post($id,Request $request)
    {
        $img1 = $request->file('pic');
        $img2 = $request->file('pic2');
        $img3 = $request->file('pic3');
        $img4 = $request->file('pic4');

        if ($img1) {
            $originalname = $img1->getClientOriginalName();
            $path = $img1->storeAs('public/user', $originalname);
            $path = str_replace('public/', '', $path);
        }
        if($img2) {
            $originalname2 = $img2->getClientOriginalName();
            $path2 = $img2->storeAs('public/user', $originalname2);
            $path2 = str_replace('public/', '', $path2);
        }
        if($img3) {
            $originalname3 = $img3->getClientOriginalName();
            $path3 = $img3->storeAs('public/user', $originalname3);
            $path3 = str_replace('public/', '', $path3);
        }
        if($img4){
            $originalname4 = $img4->getClientOriginalName();
            $path4 = $img4->storeAs('public/user', $originalname4);
            $path4 = str_replace('public/', '', $path4);
        }

        if ($request->input('type')==='Regular'){
            $enddate = Carbon::now()->addDay(7);
        }
        elseif ($request->input('type')==='Standard'){
            $enddate = Carbon::now()->addWeek(2);
        }
        elseif ($request->input('type')==='Premium'){
            $enddate = Carbon::now()->addMonth(1);
        }

        if ($path){
            $insert =Sell::insert ([
                'userid'=>$request->input('id'),
                'name'=>$request->input('custom_product_name'),
                'category'=>$request->input('category'),
                'description'=>$request->input('describe'),
                'city'=>$request->input('city'),
                'division'=>$request->input('division'),
                'price'=>$request->input('price'),
                'type'=>$request->input('type'),
                'phone'=>$request->input('prodes'),
                'img1'=>$path,
                'upload_date'=>Carbon::now(),
                'end_date'=>$enddate

            ]);
        }
        else if ($path2){
            $insert =Sell::insert ([
                'userid'=>$request->input('id'),
                'name'=>$request->input('custom_product_name'),
                'category'=>$request->input('category'),
                'description'=>$request->input('describe'),
                'city'=>$request->input('city'),
                'division'=>$request->input('division'),
                'price'=>$request->input('price'),
                'type'=>$request->input('type'),
                'phone'=>$request->input('prodes'),
                'upload_date'=>Carbon::now(),
                'img2'=>$path2,
                'end_date'=>$enddate

            ]);
        }
        else if ($path3){
            $insert =Sell::insert ([
                'userid'=>$request->input('id'),
                'name'=>$request->input('custom_product_name'),
                'category'=>$request->input('category'),
                'description'=>$request->input('describe'),
                'city'=>$request->input('city'),
                'division'=>$request->input('division'),
                'price'=>$request->input('price'),
                'type'=>$request->input('type'),
                'phone'=>$request->input('prodes'),
                'img3'=>$path3,
                'upload_date'=>Carbon::now(),
                'end_date'=>$enddate

            ]);
        }
        else if ($path4){
            $insert =Sell::insert ([
                'userid'=>$request->input('id'),
                'name'=>$request->input('custom_product_name'),
                'category'=>$request->input('category'),
                'description'=>$request->input('describe'),
                'city'=>$request->input('city'),
                'division'=>$request->input('division'),
                'price'=>$request->input('price'),
                'type'=>$request->input('type'),
                'phone'=>$request->input('prodes'),
                'img4'=>$path4,
                'upload_date'=>Carbon::now(),
                'end_date'=>$enddate
            ]);
        }
        else

            $insert =Sell::insert ([
                'userid'=>$request->input('id'),
                'name'=>$request->input('custom_product_name'),
                'category'=>$request->input('category'),
                'description'=>$request->input('describe'),
                'city'=>$request->input('city'),
                'division'=>$request->input('division'),
                'price'=>$request->input('price'),
                'type'=>$request->input('type'),
                'phone'=>$request->input('prodes'),
                'img1'=>$path,
                'img2'=>$path2,
                'img3'=>$path3,
                'img4'=>$path4,
                'upload_date'=>Carbon::now(),
                'end_date'=>$enddate
            ]);

        if ($insert){
            return redirect()->back()->with('success','Product will be online soon!!');
        }
    }

    public function yourpro($id){
        $user = User::find($id);

        $category = Categories::all();

        $userfind = PendingOrder::where('customer_id',$user->id)->first();

        $total = DB::table('orderstatus')
            ->where('customer_id',$user->id)
            ->whereIn('order_status', ['Pending'])
            ->count();

        $products2 = Sell::where('userid',$user->id)->where('action',NULL)->
            paginate(5);

        $product3 = DB::table('orderstatus')
            ->join('product', 'orderstatus.product_id', '=', 'product.pro_id')
            ->where('orderstatus.order_status', 'Delivered')
            ->orderBy('orderstatus.created_at', 'desc') // Order by the creation time in descending order
            ->select('product.pro_pic', 'product.pro_des', 'orderstatus.*')
            ->first();

        return view('yourprducts',['user'=>$user,'product3'=>$product3,'products2'=>$products2,'category'=>$category,'userfind'=>$userfind,'total'=>$total]);
    }

    public function cancel(Request $request,$id)
    {
        $user = User::find($id);

        $number = $request->input('number');

        Sell::where('id',$request->input('id'))->update([
            'action'=>'Cancel'
        ]);

        return redirect()->route('payfile',['id'=>$user,'pro'=>$request->input('id')]);
    }

}
