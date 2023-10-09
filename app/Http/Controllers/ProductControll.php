<?php

namespace App\Http\Controllers;

use App\Models\PendingOrder;
use App\Models\Product;
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

        if ($picture) {
            $originalname = $picture->getClientOriginalName();
            $path = $picture->storeAs('public/product', $originalname);
            $path = str_replace('public/', '', $path);

            $insertdata = Product::insert([
                'pro_name' => $product_name,
                'category' => $category,
                'pro_des' => $description,
                'price' => $price,
                'pro_pic' => $path
            ]);

            if ($insertdata) {
                return redirect()->back()->with('success', 'Product added successfully');
            }
            // Redirect back with a success message

        }

    }

    public function showproduct(){
        $product = Product::all();

        $order = PendingOrder::all();


        return view('maintainadmin',['product'=>$product,'order'=>$order]);
    }

    public function updateprod(Request $request)
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
            return redirect()->route('maintainadmin');
        }
        catch (Exception $e)
        {

        }
    }
}
