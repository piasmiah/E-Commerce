<?php

namespace App\Http\Controllers;

use App\Models\PendingOrder;
use App\Models\Product;
use Illuminate\Http\Request;

class Admin extends Controller
{
    public function totalsell()
    {
        $total = PendingOrder::where('order_status','Delivered')->sum('Price');

        $total2 = PendingOrder::where('order_status','Delivered')->count();

        $pen = PendingOrder::where('order_status','Pending')->count();

        $ship = PendingOrder::where('order_status','Shipping')->count();
        return view('admin',['total'=>$total,'pen'=>$pen,'ship'=>$ship,'total2'=>$total2]);
    }

    public function totalsellsreport(Request $request)
    {
        $sells = Product::all();

        $total = Product::where('pro_id',$request->input('ids'))->sum('price');
        return view('totalsells',['sells'=>$sells,'total'=>$total]);
    }

//    public function quantitysold(Request $request)
//    {
//        $sold = PendingOrder::where('product_id',$request->input('id'))->count();
//
//        return view('totalsells',['sold'=>$sold]);
//    }
}
