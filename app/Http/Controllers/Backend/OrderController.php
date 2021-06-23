<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(5);
        return view('backend.orders.index', compact('orders'));
    }

    public function edit($id)
    {
        $order = Order::where('id', $id)->with('user', 'order_details')->first();
        return view('backend.orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->update(['status' => $request->input('status')]);
        return redirect()->back();
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $order = Order::where('id', $id)->with('order_details')->first();
            foreach ($order->order_details as $item) {
                $item->delete();
            }
            $order->delete();
            DB::commit();
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }
}
