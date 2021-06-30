<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function doOrder(Request $request)
    {
        try {
            DB::beginTransaction();
            $carts = session()->has('cart') ? session()->get('cart') : [];
            $data = [
                'user_id'=>auth()->user()->id,
                'order_no'=>'Order_'.auth()->user()->id.'_'.time(),
                'price'=>$request->input('price'),
                'qty'=>$request->input('qty'),
                'payment_method'=>$request->input('method'),
                'txn_id'=>$request->input('txn_id'),
                'status'=>'pending',
            ];

            $order = Order::create($data);

            foreach ($carts as $cart){
                OrderDetail::create([
                    'order_id'=>$order->id,
                    'product_id'=>$cart['product_id'],
                    'price'=>$cart['price'],
                    'qty'=>$cart['quantity'],
                ]);
            }
            Mail::to(auth()->user()->email)->send(new OrderMail($order));
            DB::commit();
            session()->forget('cart');
            return redirect()->route('profile');
        }catch (\Exception $exception){
            DB::rollBack();

        }

    }
}
