<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $cart_id =0;
        if(!isset($_COOKIE['cart_id']))
        {
            setcookie('cart_id',uniqid());
        }
        $all_items = Item::all();

        return view('welcome', [
            'items' => $all_items,'categories'=>Category::all(),

        ]);

    }
    public function details(Item $item)
    {

        return view('/item/details',['item'=>$item]);
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $items = Item::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->get();
        return view('welcome', [
            'items' => $items,'categories'=>Category::all(),'search_request'=>$search,
        ]);
    }

    public function categories(int $category_id)
    {
        $items_by_category = Item::all()->where('category_id',$category_id);
        return view('welcome', [
            'items' => $items_by_category,'categories'=>Category::all(),
        ]);
    }

    public function index_admin()
    {
        return view('item.index', [
            'items' => Item::all(),

        ]);
    }

    public function create_item()
    {
        return view('item.item_create', [
            'categories' => Category::all(),

        ]);
    }
    public function create_new_item(Request $request)
    {
        $item = new Item();
        $item->title=$request->title;
        $item->price=$request->price;
        $item->count=$request->count;
        $item->description=$request->description;
        $item->category_id=$request->category;
        $item->age=$request->age;
        $item->save();
        return redirect()->route('index_admin');


    }
    public function update_new_item(Request $request)
    {
       $item= Item::all()->where('id',$request->id)->first();
        $item->title=$request->title;
        $item->price=$request->price;
        $item->count=$request->count;
        $item->description=$request->description;
        $item->category_id=$request->category;
        $item->age=$request->age;
        $item->save();
        return redirect()->route('index_admin');
    }
    public function update_view($id)
    {
        $item = Item::all()->where('id',$id)->first();

        return view('item.update',['item'=>$item,'categories'=>Category::all()]);
    }
    public function delete($id)
    {
        $item = Item::all()->where('id',$id)->first();
        $item->delete();
        return redirect()->route('index_admin');



    }

}
