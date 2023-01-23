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
       $pdata = product::all();
        return view('insertRead',['data'=>$pdata]);
    }

    function edit($id){
        $product = Product::find($id);
        // dd($product); exit();
        return view('edit',compact('product'));

    }

    function update(Request $request, $id){
      $product = Product::find($id);
      $input = $request->all();
    //   dd($input); exit();
      $product->update($input);
    //   return view('updateview','product');
      return redirect('/')->with('flash_message','Student Updated.');
    }


    function destroy($id){
        Product::destroy($id);
        return redirect('/')->with('flash_message','Product Deleted!');
    }


}