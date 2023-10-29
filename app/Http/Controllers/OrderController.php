<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    public function show_list()
    {
        $orders = Order::all();
        $all_items=Item::all();
        return view('orders_list',['orders'=>$orders,'all_items'=>$all_items]);
    }
    public function update_status_done($id)
    {
        $order = Order::all()->where('id',$id)->first();
        $order->status='Очікуйте на пошті';
        $order->save();
        $orders = Order::all();$all_items=Item::all();
        return view('orders_list',['orders'=>$orders,'all_items'=>$all_items]);

    }
    public function index()
    {$cart_id=$_COOKIE['cart_id'];
        \Cart::session($cart_id);
        $user_orders = Order::all()->where('user_id',Auth::id());
        $all_items=Item::all();
        if($user_orders->count()==0){
            return view('cart.orders_empty');
        }
        return view('cart.orders', [
            'orders' => $user_orders,'all_items'=>$all_items,

        ]);
    }
    public  function addOrder(Request $request)
    {
        $address = $request->address;
        if (Auth::check()) {
            if (!isset($_COOKIE['cart_id'])) setcookie('cart_id', uniqid());
            $cart_id = $_COOKIE['cart_id'];
            \Cart::session($cart_id);
            $cartCollection = \Cart::getContent();
            $order=Order::create(['address'=>$address,
            'user_id'=>Auth::id(),'count'=>\Cart::getTotalQuantity(),
                'summa'=>\Cart::getTotal(),'status'=>'В обробці...']);
            foreach ($cartCollection as $item) {
                $order_item = new OrderItem;
                $order_item->order_id = $order->id;
                $order_item->item_id = $item->id;
                $order_item->count=$item->quantity;
                $order->OrderItems()->save($order_item);

            }
            $order->save();
            \Cart::clear();
            $user_orders = Order::all()->where('user_id',Auth::id());
            $all_items=Item::all();

            return view('cart.orders', [
                'orders' => $user_orders,'all_items'=>$all_items,

            ]);

        }
        else
        {
            return redirect('/login')->with('need_auth', 'Yes');

        }
    }
}
