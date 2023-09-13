<?php

namespace App\Http\Controllers;

use App\Models\PendingOrder;
use App\Models\Bill;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class Invoice extends Controller
{
    public function generateInvoice(Request $request)
    {
        $selectedOrderIds = $request->input('selected_order_ids', []);

        foreach ($selectedOrderIds as $orderId) {
            // Retrieve the order based on the selected order ID
            $order = PendingOrder::find($orderId);


            // Create an invoice for the order
            $invoice = Bill::insert([
                'order id' => $order->order_id,
                'user_id' => $order->customer_id,
                'user_name'=>$order->customer_name,
                'product_id'=> $order->product_id,
                'products'=>$order->products,
                'Price' => $order->Price * $order->Quantity,
                'Unit_Price'=>$order->Price / $order->Quantity,
                'Quantity'=> $order->Quantity

            ]);

            if ($invoice) {
                $user = Bill::where('order id', $order->order_id)
                    ->where('user_id', $order->customer_id)
                    ->get();

                return $this->invo($order->order_id);
            }


        }

   }

   public function invo($id)
   {
       $order = PendingOrder::find($id);
       $user = Bill::where('order id', $order->order_id)->get();
       $user2 = Bill::where('user_id', $order->customer_id)->first();

       return view('invoice', compact('order', 'user','user2'));
   }

}
