<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class Chart extends Controller
{
    public function load(){
        $product = Product::select('Quantity_Sold as sold')->pluck('sold');
        $product2 = Product::select('pro_des as name')->pluck('name');

        // Pass the $product variable to the Blade template
        return view('admin', ['product' => $product, 'product2' => $product2]);
    }
}
