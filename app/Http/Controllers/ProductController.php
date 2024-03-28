<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class productController extends Controller
{
    public function index(){
        //fetch all products 
        $products=Product::get();
        //pass products to the view
        return view('products.index',['products'=>$products]);
    }
    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
        //validate data 1st
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required | mimes: jpge,jpg,png,gif | max:1000',
        ]);

        //1st upload image
        $imageName=time().'.'.$request->image->extension();

        //Now save(move) this image in public folder
        $request->image->move(public_path('products'), $imageName);

        //Now store name,decription and image in database
        $product=new Product;    //create object of Product model
        $product->image=$imageName;
        $product->name=$request->name;
        $product->description=$request->description;

        //Now save it
        $product->save();
        return back()->withSuccess('Product Create Successfully...');
    }
    public function edit($id){
        //fetch data from db agaisnt this id
        $product=Product::where('id',$id)->first();
        return view('products.edit',['product'=>$product]);
    }
    public function update(Request $request, $id){
        //validate data 1st
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'nullable | mimes: jpge,jpg,png,gif | max:1000',
        ]);
        $product=Product::where('id',$id)->first();
        if(isset($request->image)){
            $imageName=time().'.'.$request->image->extension();
            //Now save(move) this image in public folder
        $request->image->move(public_path('products'), $imageName);
        $product->image=$imageName;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->save();
        return back()->withSuccess('Product updated successfully...');

        }
        
    }
    public function delete( $id){
      $product=Product::where('id',$id)->first();
      $product->delete();
      return back()->withSuccess("Product has been deleted successfully...");
        
    }
}
