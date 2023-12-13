<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\PendingOrder;
use App\Models\Product;
use App\Models\Sell;
use App\Models\SellerAcc;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    public function sellerregistrationpage(Request $request)
    {
        $category = Categories::all();

        return view('sellerregistration',['category'=>$category]);
    }

    public function sellerregister(Request $request)
    {
        $name = $request->input('names');
        $store = $request->input('storenames');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $userid = $request->input('userid');
        $password = $request->input('password');
        $business = $request->file('business');
        $tin = $request->input('tin');

        if($business) {
            $originalname2 = $business->getClientOriginalName();

            $path2 = $business->storeAs('public/seller/certificate', $originalname2);

            $path2 = str_replace('public/', '', $path2);


            $insert = SellerAcc::insert([
                'seller_name' => $name,
                'store_name' => $store,
                'phone' => $phone,
                'email' => $email,
                'username' => $userid,
                'password' => $password,
                'approval' => 'Pending',
                'Business_certificate'=>$path2,
                'TIN'=>$tin
            ]);

        }
        if ($insert)
        {
            return redirect()->back()->with('info','Registration Successfull');
        }


    }

    public function showDashboard($id)
    {
        $user = SellerAcc::find($id);

        $category = Categories::all();



        $products = Product::where('seller_id',$user->seller_id)->get();

        return view('sellerhomepage',['user'=>$user,'category'=>$category,'products'=>$products]);
    }

    public function showAddProduct($id)
    {
        $user = SellerAcc::find($id);

        $category = Categories::all();

        $sub = Product::select('pro_name')->distinct()->get();

        return view('addproduct',['user'=>$user,'category'=>$category,'sub'=>$sub]);
    }

    public function addproduct(Request $request)
    {

        $user = $request->input('id');
        $product_name = $request->input('product_name');
        $category = $request->input('category');
        $description = $request->input('prodes');
        $price = $request->input('price');
        $picture = $request->file('pic');
        $stock = $request->input('stock');
        $date = Carbon::now()->format('Y-m-d');
        $comingdate = $request->input('date');
        $products = $request->input('products');



        if ($product_name !== 'other') {
            $custom_product_name = $product_name;
        } else {
            $custom_product_name = $request->input('custom_product_name');
        }

        if($products === 'LIVE') {
            if ($picture) {
                $originalname = $picture->getClientOriginalName();
                $path = $picture->storeAs('public/seller', $originalname);
                $path = str_replace('public/', '', $path);


                $insertdata = Product::insert([
                    'seller_id'=>$user,
                    'pro_name' => $custom_product_name,
                    'category' => $category,
                    'pro_des' => $description,
                    'price' => $price,
                    'pro_pic' => $path,
                    'Stock'=>$stock,
                    'Stock_Status'=>$request->input('status'),
                    'created_at' => $date,
                    'Quantity_Sold' => 0,
                    'upcoming_date' => $comingdate,
                    'date_status'=>'LIVE'
                ]);

            }
        }
        if($products === 'upcoming') {
            if ($picture) {
                $originalname = $picture->getClientOriginalName();
                $path = $picture->storeAs('public/seller', $originalname);
                $path = str_replace('public/', '', $path);


                $insertdata = Product::insert([
                    'seller_id'=>$user,
                    'pro_name' => $custom_product_name,
                    'category' => $category,
                    'pro_des' => $description,
                    'price' => $price,
                    'pro_pic' => $path,
                    'created_at' => $date,
                    'Quantity_Sold' => 0,
                    'upcoming_date' => $comingdate,
                    'date_status'=>'upcoming'
                ]);

            }
        }

        if ($insertdata) {
            return redirect()->back()->with('success', 'Product added successfully');
        }
    }

    public function showList($id,$categories)
    {
        $user = SellerAcc::where('seller_id',$id)->first();
        $products = Product::where('seller_id',$user->seller_id)->where('category', $categories)->get();
        $category = Categories::all();
        $category2 = Categories::where('Category_Name',$categories)->first();
        return view('sellerproduct',['products'=>$products,'user'=>$user,'category2'=>$category2,'id'=>$user->seller_id,'category'=>$category]);
    }

    public function totalsells($id){
        $category = Categories::all();
        $user = SellerAcc::where('seller_id',$id)->first();

        $currentDate = Carbon::now()->format('m');

        $product = DB::table('orderstatus')
            ->join('product','product.pro_id','=','orderstatus.product_id')
            ->where('orderstatus.seller_id',$user->seller_id)
            ->whereMonth('orderstatus.created_at',$currentDate)
            ->select('orderstatus.*','product.pro_pic')
            ->get();

        return view('sellertotalsells',['user'=>$user,'category'=>$category,'product'=>$product,'currentDate'=>$currentDate]);
    }

    public function dailyupdate($id){
        $currentDate = Carbon::now()->format('F');
        $currentDate2 = Carbon::now()->format('m');
        $user = SellerAcc::find($id);

        $daily = PendingOrder::select('products', DB::raw('SUM(Quantity) as total_quantity'))
            ->where('created_at', $currentDate2)
            ->where('seller_id',$user->seller_id)
            ->groupBy('products')
            ->get();

        return view('dailyupdate',['id'=>$user,'currentDate'=>$currentDate,'daily'=>$daily]);
    }

    public function monthly($id, Request $request){
        $user = SellerAcc::find($id);

        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now();



        $currentDate = Carbon::now()->format('M d, Y');
        $currentDate2 = Carbon::now()->format('Y-m-d');
        $currentMonth = Carbon::now()->format('F Y');
        $currentMonth2 = Carbon::now()->format('F');
        $currentMonth3 = Carbon::now()->format('m');

        $totalsales = PendingOrder::where('order_status','Delivered')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->where('seller_id', $user->seller_id)
            ->sum('price');

        $totalsales2 = PendingOrder::where('order_status','Delivered')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->where('seller_id', $user->seller_id)
            ->count();

        $categorySold = DB::table('product')
            ->join('orderstatus', 'product.pro_id', '=', 'orderstatus.product_id')
            ->select('product.category',
                DB::raw('SUM(orderstatus.Quantity) as total_quantity_sold'),
                DB::raw('SUM(orderstatus.Quantity * product.price) as total_price')
            )
            ->groupBy('product.category')
            ->havingRaw('total_quantity_sold >= 1')
            ->where('orderstatus.seller_id', $user->seller_id)
            ->whereBetween('orderstatus.Date', [$startDate, $endDate])
            ->orderBy('total_quantity_sold', 'desc')
            ->get();

        $totalPrice = DB::table('product')
            ->join('orderstatus', 'product.pro_id', '=', 'orderstatus.product_id')
            ->where('orderstatus.order_status', 'Delivered')
            ->where('orderstatus.seller_id', $user->seller_id)
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
            ->where('orderstatus.seller_id', $user->seller_id)
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
            ->where('orderstatus.seller_id', $user->seller_id)
            ->groupBy('product.pro_id', 'product.pro_name','product.pro_des')
            ->orderBy('total_sold', 'desc')
            ->take(5)
            ->get();


        $visitors = $request->ip();

        $countvisit = Visitor::where('ip_address', $visitors)->count();
        return view('monthly',['topProducts'=>$topProducts,'id'=>$user,'endDate'=>$endDate,'topProducts2'=>$topProducts2,'countvisit'=>$countvisit,'categorySold'=>$categorySold,'totalsales'=>$totalsales,'totalsales2'=>$totalsales2,'currentDate'=>$currentDate,'currentMonth'=>$currentMonth]);

    }

    public function manageProduct($id){
        $user = SellerAcc::find($id);

        $category = Categories::all();

        $product = Product::where('seller_id',$user->seller_id)->get();

        return view('sellermanage',['user'=>$user,'category'=>$category,'product'=>$product]);
    }

    public function updateproduct(Request $request)
    {
        $user = $request->input('seller');

        $update = Product::where('seller_id',$user)
            ->where('pro_id',$request->input('id'))
            ->first();

        $currentprice = $update->price;
        $newprice = $request->input('price');

        if($currentprice === $newprice)
            Product::where('seller_id',$user)
                ->where('pro_id',$request->input('id'))
                ->update([
                'pro_des'=>$request->input('description'),
                'Stock'=>$request->input('stock'),
                'date_status'=>$request->input('status'),
                'price' => $currentprice
            ]);
        else
            Product::where('seller_id',$user)
                ->where('pro_id',$request->input('id'))
                ->update([
                'pro_des'=>$request->input('description'),
                'Stock'=>$request->input('stock'),
                'date_status'=>$request->input('status'),
                'Previous_Price' => $currentprice,
                'price'=>$newprice
            ]);


        return redirect()->back()->with('success','Update Successfull');
    }

    public function sellerprofile($id){
        $user = SellerAcc::find($id);

        $category = Categories::all();

        return view('sellerprofile',['user'=>$user,'category'=>$category]);
    }

    public function sellerprofileupdate($id, Request $request){
        $user = SellerAcc::find($id);

        $img = $request->file('pic');
        $certificate = $request->file('certificate');

        if ($img) {
            $originalname = $img->getClientOriginalName();
            $path = $img->storeAs('public/sellerprofile', $originalname);
            $path = str_replace('public/', '', $path);
            SellerAcc::where('seller_id', $user->seller_id)
                ->update([
                    'Pic' => $path,
                ]);
        }
        if ($certificate){
            $originalname2 = $certificate->getClientOriginalName();

            $path2 = $certificate->storeAs('public/seller/certificate', $originalname2);

            $path2 = str_replace('public/', '', $path2);
            SellerAcc::where('seller_id', $user->seller_id)
                ->update([
                    'Business_certificate' => $path2,
                ]);
        }

        SellerAcc::where('seller_id', $user->seller_id)
            ->update([
                'store_name'=>$request->input('store'),
                'phone'=>$request->input('phone'),
                'email'=>$request->input('email'),
                'Website'=>$request->input('website'),
                'address'=>$request->input('address')
            ]);

        return redirect()->back()->with('success','Profile Update Successfull!!');
    }
}
