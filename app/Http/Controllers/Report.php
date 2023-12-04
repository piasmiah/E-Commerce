<?php

namespace App\Http\Controllers;

use App\Models\SellerAcc;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Subscriber;
use App\Models\PendingOrder;
use App\Models\User;
use App\Models\Product;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class Report extends Controller
{
    public function reportTotal(Request $request){
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now();



        $currentDate = Carbon::now()->format('M d, Y');
        $currentDate2 = Carbon::now()->format('Y-m-d');
        $currentMonth = Carbon::now()->format('F Y');
        $currentMonth2 = Carbon::now()->format('F');
        $currentMonth3 = Carbon::now()->format('m');

        $totalsales = PendingOrder::where('order_status','Delivered')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('price');

        $totalsales2 = PendingOrder::where('order_status','Delivered')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();

        $categorySold = DB::table('product')
            ->join('orderstatus', 'product.pro_id', '=', 'orderstatus.product_id')
            ->select('product.category',
                DB::raw('SUM(orderstatus.Quantity) as total_quantity_sold'),
                DB::raw('SUM(orderstatus.Quantity * product.price) as total_price')
            )
            ->groupBy('product.category')
            ->havingRaw('total_quantity_sold >= 1')
            ->whereBetween('orderstatus.Date', [$startDate, $endDate])
            ->orderBy('total_quantity_sold', 'desc')
            ->get();

        $totalPrice = DB::table('product')
            ->join('orderstatus', 'product.pro_id', '=', 'orderstatus.product_id')
            ->where('orderstatus.order_status', 'Delivered')
            ->sum(DB::raw('orderstatus.Quantity * product.price'));

        $topProducts = DB::table('product')
            ->join('orderstatus', 'product.pro_id', '=', 'orderstatus.product_id')
            ->leftJoin('comments_ratings', 'product.pro_id', '=', 'comments_ratings.item_id')
            ->select('product.pro_id', 'product.pro_name', 'product.pro_des',
                DB::raw('SUM(orderstatus.Quantity) as total_sold'),
                DB::raw('AVG(comments_ratings.rating) as avg_rating'))
            ->where('orderstatus.order_status', 'Delivered')
            ->where('orderstatus.Quantity', '=>',3)
            ->whereMonth('orderstatus.created_at',$currentMonth3 )
            ->groupBy('product.pro_id', 'product.pro_name','product.pro_des')
            ->orderBy('total_sold', 'desc')
            ->take(5)
            ->get();

        $topProducts2 = DB::table('product')
            ->join('orderstatus', 'product.pro_id', '=', 'orderstatus.product_id')
            ->leftJoin('comments_ratings', 'product.pro_id', '=', 'comments_ratings.item_id')
            ->select('product.pro_id', 'product.pro_name', 'product.pro_des',
                DB::raw('SUM(orderstatus.Quantity) as total_sold'),
                DB::raw('AVG(comments_ratings.rating) as avg_rating'))
            ->where('orderstatus.order_status', 'Delivered')
            ->where('orderstatus.Quantity', '<=',3)
            ->whereMonth('orderstatus.created_at',$currentMonth3 )
            ->groupBy('product.pro_id', 'product.pro_name','product.pro_des')
            ->orderBy('total_sold', 'desc')
            ->take(5)
            ->get();

        $seller = SellerAcc::first();

        $topProducts3 = DB::table('orderstatus')
            ->join('selleraccount', 'selleraccount.seller_id', '=', 'orderstatus.seller_id')
            ->select('selleraccount.seller_id', 'selleraccount.store_name', DB::raw('COUNT(orderstatus.Quantity) as total_products_sold'), DB::raw('SUM(orderstatus.Price) as total_price'))
            ->groupBy('selleraccount.seller_id', 'selleraccount.store_name')
            ->where('orderstatus.order_status','Delivered')
            ->whereMonth('orderstatus.Date',$currentMonth3)
            ->having('total_products_sold', '>', 3)
            ->take(5)
            ->get();

        $topProducts4 = DB::table('orderstatus')
            ->join('selleraccount', 'selleraccount.seller_id', '=', 'orderstatus.seller_id')
            ->select('selleraccount.seller_id', 'selleraccount.store_name', DB::raw('COUNT(orderstatus.Quantity) as total_products_sold'), DB::raw('SUM(orderstatus.Price) as total_price'))
            ->groupBy('selleraccount.seller_id', 'selleraccount.store_name')
            ->where('orderstatus.order_status','Delivered')
            ->whereMonth('orderstatus.Date',$currentMonth3)
            ->having('total_products_sold', '<=', 3)
            ->take(5)
            ->get();

        $delivary = DB::table('orderstatus')
            ->join('delivary', 'delivary.id', '=', 'orderstatus.delivary_boy_id')
            ->select('delivary.id', 'delivary.name', DB::raw('COUNT(orderstatus.order_status) as total'))
            ->groupBy('delivary.id', 'delivary.name')
            ->where('orderstatus.order_status','Delivered')
            ->having('total', '>', 3)
            ->whereMonth('orderstatus.Date',$currentMonth3)
            ->take(5)
            ->get();

        $delivary2 = DB::table('orderstatus')
            ->join('delivary', 'delivary.id', '=', 'orderstatus.delivary_boy_id')
            ->select('delivary.id', 'delivary.name', DB::raw('COUNT(orderstatus.order_status) as total'))
            ->groupBy('delivary.id', 'delivary.name')
            ->where('orderstatus.order_status','Delivered')
            ->having('total', '<', 3)
            ->whereMonth('orderstatus.Date',$currentMonth3)
            ->take(5)
            ->get();

        $topUsers = DB::table('orderstatus')
            ->join('users', 'users.id', '=', 'orderstatus.customer_id')
            ->select('users.id', 'users.name','users.phone', DB::raw('COUNT(orderstatus.Quantity) as total_products_sold'), DB::raw('SUM(orderstatus.Price) as total_price'))
            ->groupBy('users.id', 'users.name','users.phone')
            ->where('orderstatus.order_status','Delivered')
            ->whereMonth('orderstatus.Date',$currentMonth3)
            ->having('total_products_sold', '>=', 5)
            ->take(10)
            ->get();

        $topConsumers = DB::table('orderstatus')
            ->join('users', 'users.id', '=', 'orderstatus.user_id')
            ->select('users.id', 'users.name','users.phone', DB::raw('COUNT(orderstatus.Quantity) as total_products_sold'), DB::raw('SUM(orderstatus.Price) as total_price'))
            ->groupBy('users.id', 'users.name','users.phone')



            ->take(10)
            ->get();


        $visitors = $request->ip();

        $countvisit = Visitor::where('ip_address', $visitors)->count();
        return view('report',['topProducts'=>$topProducts,'topConsumers'=>$topConsumers,'topUsers'=>$topUsers,'delivary'=>$delivary,'delivary2'=>$delivary2,'endDate'=>$endDate,'topProducts2'=>$topProducts2,'topProducts4'=>$topProducts4,'topProducts3'=>$topProducts3,'countvisit'=>$countvisit,'categorySold'=>$categorySold,'totalsales'=>$totalsales,'totalsales2'=>$totalsales2,'currentDate'=>$currentDate,'currentMonth'=>$currentMonth]);
    }

    public function reportTotal2(Request $request){
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now();



        $currentDate = Carbon::now()->format('M d, Y');
        $currentDate2 = Carbon::now()->format('Y-m-d');
        $currentMonth = Carbon::now()->format('F Y');
        $currentMonth2 = Carbon::now()->format('F');

        $totalsales = PendingOrder::where('order_status','Delivered')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('price');

        $totalsales2 = PendingOrder::where('order_status','Delivered')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();

        $categorySold = DB::table('product')
            ->join('orderstatus', 'product.pro_id', '=', 'orderstatus.product_id')
            ->select('product.category',
                DB::raw('SUM(orderstatus.Quantity) as total_quantity_sold'),
                DB::raw('SUM(orderstatus.Quantity * product.price) as total_price')
            )
            ->groupBy('product.category')
            ->havingRaw('total_quantity_sold >= 10')
            ->whereMonth('orderstatus.date', $currentMonth2)
            ->orderBy('total_quantity_sold', 'desc')
            ->get();

        $totalPrice = DB::table('product')
            ->join('orderstatus', 'product.pro_id', '=', 'orderstatus.product_id')
            ->where('orderstatus.order_status', 'Delivered')
            ->sum(DB::raw('orderstatus.Quantity * product.price'));

        $topProducts = DB::table('product')
            ->join('orderstatus', 'product.pro_id', '=', 'orderstatus.product_id')
            ->leftJoin('comments_ratings', 'product.pro_id', '=', 'comments_ratings.item_id')
            ->select('product.pro_id', 'product.pro_name', 'product.pro_des',
                DB::raw('SUM(orderstatus.Quantity) as total_sold'),
                DB::raw('AVG(comments_ratings.rating) as avg_rating'))
            ->where('orderstatus.order_status', 'Delivered')
            ->whereBetween('orderstatus.created_at', [$startDate, $endDate])
            ->groupBy('product.pro_id', 'product.pro_name','product.pro_des')
            ->orderBy('total_sold', 'desc')
            ->take(5)
            ->get();

//        $topProducts2 = DB::table('orderstatus')
//            ->where('order_status','Delivered')
////            ->where('created_at',$currentDate2)
//            ->distinct()
//            ->pluck('products');
//        $topProducts2 = DB::table('product')
//            ->join('orderstatus', 'product.pro_id', '=', 'orderstatus.product_id')
//            ->leftJoin('comments_ratings', 'product.pro_id', '=', 'comments_ratings.item_id')
//            ->select('product.pro_id', 'product.pro_name', 'product.pro_des',
//                DB::raw('SUM(orderstatus.Quantity) as total_sold'),
//                DB::raw('AVG(comments_ratings.rating) as avg_rating'))
//            ->where('orderstatus.order_status', 'Delivered')
//            ->where('orderstatus.created_at',$currentDate2)
//            ->groupBy('product.pro_id', 'product.pro_name','product.pro_des')
//            ->orderBy('total_sold', 'desc')
//            ->distinct()
//            ->get();

        $daily = PendingOrder::select('products', DB::raw('SUM(Quantity) as total_quantity'))
            ->where('created_at', $currentDate2)
            ->groupBy('products')
            ->get();

        $seller = SellerAcc::first();

        $daily2 = PendingOrder::select('products', DB::raw('SUM(Quantity) as total_quantity'))
            ->where('seller_id',$seller->seller_id)
            ->where('created_at', $currentDate2)
            ->groupBy('products')
            ->get();


        $visitors = $request->ip();

        $countvisit = Visitor::where('ip_address', $visitors)->count();
        return view('report2',['topProducts'=>$topProducts,'endDate'=>$endDate,'daily'=>$daily,'daily2'=>$daily2,'countvisit'=>$countvisit,'categorySold'=>$categorySold,'totalsales'=>$totalsales,'totalsales2'=>$totalsales2,'currentDate'=>$currentDate,'currentMonth'=>$currentMonth]);
    }


}
