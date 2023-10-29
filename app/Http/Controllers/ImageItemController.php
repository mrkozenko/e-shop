<?php

namespace App\Http\Controllers;

use App\Models\ItemImage;
use Illuminate\Http\Request;

class ImageItemController extends Controller
{
    public function index()
    {
        $images = ItemImage::all();
        return view('ItemImage.index',[
            'images'=>$images
        ]);
    }

    public function addImage(){
        return view('ItemImage.add_new_image');
    }

    public function storeImage(Request $request){
        $data= new ItemImage();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path("images"), $filename);
            $data['img']= $filename;
            $data['item_id']= $request->id;

        }
        $data->save();
        return redirect()->route('show_images');

    }
    public function update_image(Request $request){
        $image = ItemImage::all()->where('id',$request->id)->first();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path("images"), $filename);
            $image->img= $filename;

        }
        $image->save();
        return redirect()->route('show_images');

    }
    public function update_img($id)
    {
        $image = ItemImage::all()->where('id',$id)->first();
        return view('ItemImage.update',['image'=>$image]);
    }
    public function deleteImage($id)
    {
        $image = ItemImage::all()->where('id',$id)->first();
        $image->delete();
        return redirect()->route('show_images');


    }
}
