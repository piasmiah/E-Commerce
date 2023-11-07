<?php

namespace App\Http\Controllers;

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
        $currentMonth = Carbon::now()->format('F Y');

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


        $visitors = $request->ip();

        $countvisit = Visitor::where('ip_address', $visitors)->count();
        return view('report',['topProducts'=>$topProducts,'countvisit'=>$countvisit,'categorySold'=>$categorySold,'totalsales'=>$totalsales,'totalsales2'=>$totalsales2,'currentDate'=>$currentDate,'currentMonth'=>$currentMonth]);
    }


}
