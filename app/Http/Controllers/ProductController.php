<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function allProducts(){
        $allProducts = ProductModel::all();
        return view('/welcome',compact('allProducts'));
    }

    public function addProduct(){
        return view('products.addView');
    }

    public function addNewProduct(Request $request){
        $request->validate([
            'name'=>'required|string',
            'price'=>'required|numeric',
            'amount'=>'required|numeric',
            'description'=>'required|string|min:5|max:100'
        ]);
        // dd($request->all());
        

        ProductModel::create([
            'name'=>$request->get('name'),
            'price'=>$request->get('price'),
            'amount'=>$request->get('amount'),
            'description'=>$request->get('description')

        ]);

        return redirect(route('shop'))->with('addProduct','You have successfully add product!');
    }

    public function viewProduct($id){
        $product = ProductModel::find($id);
        return view('products.singleProduct',compact('product'));
    }

    public function deleteProduct($id){
        $product = ProductModel::find($id);
        if($product == null){
            echo "Ovaj product ne postoji";
        }else{
            $product->delete();
        }
        return redirect()->back()->with('deleteProduct','Product deleted!!');
    }
}
