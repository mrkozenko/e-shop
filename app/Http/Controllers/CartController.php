<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        if(!isset($_COOKIE['cart_id'])) setcookie('cart_id',uniqid());
        $cart_id=$_COOKIE['cart_id'];
        \Cart::session($cart_id);
        $cartCollection = \Cart::getContent();
        if($cartCollection->count()==0){
            return view('cart.empty_cart');
        }
        return view('cart.index',['cart_items'=>$cartCollection]);
    }
    public function  addToCart(Request $request)
    {

        $product = Item::where('id',$request->id)->first();

        if(!isset($_COOKIE['cart_id'])) setcookie('cart_id',uniqid());
        $cart_id=$_COOKIE['cart_id'];
        \Cart::session($cart_id);
        \Cart::add(
            ['id'=>$product->id,
                'name'=>$product->title,
                'quantity'=>1,
                'price'=>$product->price,
                'attributes'=>$product->images[0]->img]
        );
        return response()->json([\Cart::getContent()]);
    }
    public function  deleteFromCart(int $id)
    {

        $product = Item::where('id',$id)->first();

        if(!isset($_COOKIE['cart_id'])) setcookie('cart_id',uniqid());
        $cart_id=$_COOKIE['cart_id'];
        \Cart::session($cart_id);
        \Cart::remove($product->id);
        $cartCollection = \Cart::getContent();

        if($cartCollection->count()==0){
            return view('cart.empty_cart');
        }
        return view('cart.index',['cart_items'=>$cartCollection]);
    }
}
