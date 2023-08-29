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
            'amount'=>'required|numeric'
        ]);

        ProductModel::create([
            'name'=>$request->get('name'),
            'price'=>$request->get('price'),
            'amount'=>$request->get('amount'),

        ]);

        return redirect(route('shop'))->with('addProduct','You have successfully add product!');
    }
}
