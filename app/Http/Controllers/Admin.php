<?php

namespace App\Http\Controllers;

use App\Models\PendingOrder;
use App\Models\Product;
use Illuminate\Http\Request;

class Admin extends Controller
{
    public function totalsell(Request $request)
    {
        $total = PendingOrder::where('order_status','Delivered')->sum('Price');

        $total2 = PendingOrder::where('order_status','Delivered')->count();

        $pen = PendingOrder::where('order_status','Pending')->count();

        $ship = PendingOrder::where('order_status','Shipping')->count();

        $products = Product::all();

        $orderinfo = PendingOrder::inRandomOrder()->limit(5)->get();

        $orderinfo2 = PendingOrder::all();

        $sells = Product::all();

        $total3 = Product::where('pro_id',$request->input('ids'))->sum('price');
        return view('admin',['total'=>$total,'pen'=>$pen,'ship'=>$ship,'total2'=>$total2,'products'=>$products,'orderinfo'=>$orderinfo,'orderinfo2'=>$orderinfo2,'sells'=>$sells,'total3'=>$total3]);
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
