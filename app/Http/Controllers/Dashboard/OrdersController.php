<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
class OrdersController extends Controller
{
    public function index (Request $request)
    {
        $orders = Order::whereHas('client', function($q) use ($request){
            return $q->where('name', 'like' ,  '%' . $request->search . '%');

        })->latest()->paginate(5);
        return view('admin.orders.index',compact('orders'));
    }
    public function products(Order $order)
    {
         $products=$order->products;
         return view('admin.orders._products', compact('order','products'));
    }
    // public function show(Order $order)
    // {
    //     return $order;
        
    // }
    public function destroy(Order $order)
    {
         foreach ($order->products as $product) {

            $product->update([
                'stock' => $product->stock + $product->pivot->quantity
            ]);

        }//end of for each

        $order->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.orders.index');
    }
}