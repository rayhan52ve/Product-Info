<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Input; 
use Image;

class ProductController extends Controller
{
    function insert(Request $request){
        // dd($request->all());
        if($request->isMethod("post")){

         if($request->hasFile('image')){
            $image_tmp = $request->image;
            if ($image_tmp->isValid()){
                // Upload Images after Resize
                $extension = $image_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $small_image_path = 'uploads'.'/'.$fileName;  

                 Image::make($image_tmp)->resize(300, 300)->save($small_image_path);
            

              }   

            }
            
            
        }
            $product = new Product;
            $product->pName = $request->pname;
            $product->pPrice = $request->pprice;
            $product->pImage = $fileName; 
            $product->save();
            return redirect('/');
         
   
    
        
    }
 

    

    function readdata(){
       $products = product::all();
        return view('index',compact('products'));
    }

    function edit($id){
        $product = Product::find($id);
        // dd($product); exit();
        return view('edit',compact('product'));

    }

    function update(Request $request, $id){
      $product = Product::find($id);
      $product->update($request->all());
    //   return view('updateview','product');
    session()->flash('msg','Product Updated Successfully');
    session()->flash('cls','success');
      return redirect('/')->with('flash_message','Product Updated!');
    }


    function destroy($id){
        Product::destroy($id);
        session()->flash('msg','Product Deleted Successfully');
        session()->flash('cls','danger');
        return redirect('/')->with('flash_message','Product Deleted!');
    }


}