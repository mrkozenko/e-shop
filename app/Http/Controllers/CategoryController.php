<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.category',[
            'categories'=>$categories
        ]);

    }
    public function add_new_category_view()
    {
        return view('category.add_category');
    }

    public function add_category(Request $request)
    {
       $category =  Category::create(['title'=>$request->title]);
       $category->save();
        $categories = Category::all();
        return view('category.category',[
            'categories'=>$categories
        ]);
    }
    public function show_update($id)
    {
        $category = Category::all()->where('id',$id)->first();
        return view('category.edit',[
            'category'=>$category
        ]);
    }
    public function update_category(Request $request)
    {
        $category = Category::all()->where('id',$request->id)->first();
        $category->title=$request->title;
        $category->save();
        $categories = Category::all();
        return view('category.category',[
            'categories'=>$categories
        ]);
    }
    public function delete_category($id)
    {

        $category = Category::all()->where('id',$id)->first();
        $category->delete();
        $categories = Category::all();
        return view('category.category',[
            'categories'=>$categories
        ]);
    }


}
