<?php

namespace App\Http\Controllers;

use App\Models\Categories;
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

        $orderinfo = PendingOrder::inRandomOrder()->limit(10)->get();

        $orderinfo2 = PendingOrder::all();

        $sells = Product::all();

        $total3 = Product::where('pro_id',$request->input('ids'))->sum('price');

        $topProducts = Product::select('pro_des as name', 'Quantity_Sold as sold')
            ->whereNotNull('pro_des')
            ->where('Quantity_Sold', '>', 0) // Exclude rows with empty 'pro_des' or 'Quantity_Sold' field
            ->orderBy('Quantity_Sold', 'desc') // Order by Quantity_Sold in descending order
            ->take(5)
            ->get();

        $randomTopProducts = $topProducts->shuffle();

        $product2 = $randomTopProducts->pluck('name');

        $product = $randomTopProducts->pluck('sold');



        return view('admin',['product' => $product, 'product2' => $product2,'total'=>$total,'pen'=>$pen,'ship'=>$ship,'total2'=>$total2,'products'=>$products,'orderinfo'=>$orderinfo,'orderinfo2'=>$orderinfo2,'sells'=>$sells,'total3'=>$total3]);
    }

    public function totalsellsreport(Request $request)
    {
        $sells = Product::all();

        $total = Product::where('pro_id',$request->input('ids'))->sum('price');
        return view('totalsells',['sells'=>$sells,'total'=>$total]);
    }

    public function addcategory(Request $request)
    {
        $add = Categories::insert([
            'Category_Name'=>$request->input('category')
        ]);
        if ($add)
        {
            return redirect()->route('maintainadmin');
        }
    }

//    public function showcata()
//    {
//        $show = Categories::get();
//
//        return view('maintainadmin',['show'=>$show]);
//    }

//    public function quantitysold(Request $request)
//    {
//        $sold = PendingOrder::where('product_id',$request->input('id'))->count();
//
//        return view('totalsells',['sold'=>$sold]);
//    }
}
