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
}
