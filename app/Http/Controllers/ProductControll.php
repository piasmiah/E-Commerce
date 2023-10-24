<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\PendingOrder;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class ProductControll extends Controller
{
    public function storeProduct(Request $request)
    {
        // Validate form data

        $product_name = $request->input('product_name');
        $category = $request->input('category');
        $description = $request->input('description');
        $price = $request->input('price');
        $picture = $request->file('picture');
        $stock = $request->input('stock');
        $date = Carbon::now();

        if ($picture) {
            $originalname = $picture->getClientOriginalName();
            $path = $picture->storeAs('public/product', $originalname);
            $path = str_replace('public/', '', $path);

            $insertdata = Product::insert([
                'pro_name' => $product_name,
                'category' => $category,
                'pro_des' => $description,
                'price' => $price,
                'pro_pic' => $path,
                'Stock'=>$stock,
                'Stock_Status'=>$request->input('status'),
                'created_at' => $date,
                'Quantity_Sold' => 0
            ]);

            if ($insertdata) {
                return redirect()->back()->with('success', 'Product added successfully');
            }
            // Redirect back with a success message

        }

    }

    public function showproduct(){
        $product = Product::all();
        $count = Product::where('Stock_Status','Out of Stock')->count();
        $countLowStock = Product::where('Stock', '>=', 1)->where('Stock', '<=', 2)->count();
        $show = Categories::all();
        $order = PendingOrder::all();

        return view('maintainadmin',['product'=>$product,'order'=>$order,'show'=>$show,'count'=>$count,'countLowStock'=>$countLowStock]);
    }

    public function updateCategory(Request $request)
    {
        Categories::where(['SL_No' => $request->input('id')])
            ->update(['Category_Name'=>$request->input('edit')]);

        return redirect()->route('maintainadmin')->with('success', 'Category updated successfully');
    }

    public function update(Request $request)
    {
        $new = $request->input('newprice');
        $picture = $request->file('pro_image');

        if(!empty($picture)) {
            $originalname = $picture->getClientOriginalName();
            $path = $picture->storeAs('public/product', $originalname);
            $path = str_replace('public/', '', $path);

            $updates = DB::table('product')
                ->where('pro_id', $request->input('proid'))
                ->update([
                    'pro_name' => $request->input('name'),
                    'category' => $request->input('category'),
                    'pro_des' => $request->input('descrip'),
                    'price' => $request->input('price'),
                    'Stock' => $request->input('stock'),
                    'Stock_Status' => 'Available',
                    'pro_pic' => $path
                ]);
        }
        else
        {
            $updates = DB::table('product')
                ->where('pro_id', $request->input('proid'))
                ->update([
                    'pro_name' => $request->input('name'),
                    'category' => $request->input('category'),
                    'pro_des' => $request->input('descrip'),
                    'price' => $request->input('price'),
                    'Stock' => $request->input('stock'),
                    'Stock_Status' => 'Available',
                ]);
        }
        if (!empty($new)){
            DB::table('product')
                ->where('pro_id', $request->input('proid'))
                ->update([
                    'price' => $new,
                    'Previous_Price' =>$request->input('price')
                ]);
        }

        return redirect()->route('maintainadmin');
    }

    public function updateprod(Request $request)
    {
        try {
            $update = DB::table('orderstatus')
                ->where('order_id', $request->input('id'))
                ->where('customer_id', $request->input('ids'))
                ->update([
                    'order_status' => $request->input('status'),
                    'Date' => $request->input('date'),
                ]);

            $update2 = DB::table('product')
                ->where('pro_id', $request->input('pro_id'))
                ->increment('Quantity_Sold', $request->input('quan'));

            return redirect()->route('maintainadmin');
        }
        catch (Exception $e)
        {

        }
    }

//    public function redirectpage2($category)
//    {
//        if ($category === 'Electronic') {
//            $products = Product::where('category', 'Electronic')->get();
//            return redirect()->route('productlist2', ['category' => $category])->with('products', $products);
//        }
//
//        else if ($category === 'Men') {
//            $products = Product::where('category', 'Electronic')->get();
//            return redirect()->route('productlist2', ['category' => $category])->with('products', $products);
//        }
//    }

    public function showProductList2($id,$category)
    {
        $user = User::where('id',$id)->first();
        $products = Product::where('category', $category)->latest()->get();
        $categories = Categories::get();// Retrieve the products data from the session
        return view('productlist2', compact('user','category','products','categories'));
    }
}
