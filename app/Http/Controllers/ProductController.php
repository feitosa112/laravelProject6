<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //funkcija za prikaz svih proizvoda na welcome stranici
    public function allProducts(){
        $allProducts = ProductModel::all();
        return view('/welcome',compact('allProducts'));
    }

    //funkcija za prikaz forme za dodavanje novog proizvoda 
    public function addProduct(){
        return view('products.addView');
    }

    //funkcija za unos novog proizvoda preko forme
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
            'description'=>$request->get('description'),
            'userID'=>Auth::user()->id

        ]);

        return redirect(route('shop'))->with('addProduct','You have successfully add product!');
    }

    //funkcija za prikaz odredjenog proizvoda na osnovu id broja
    public function viewProduct($id){
        $product = ProductModel::find($id);
        return view('products.singleProduct',compact('product'));
    }

    //funkcija za brisanje odredjenog proizvoda
    public function deleteProduct($id){
        $product = ProductModel::find($id);
        if($product == null){
            echo "Ovaj product ne postoji";
        }else{
            $product->delete();
        }
        return redirect()->back()->with('deleteProduct','Product deleted!!');
    }

    //funkcija za prikaz forme za editovanje proizvoda
    public function showEditForm($id){
        $product = ProductModel::find($id);
        return view('products.edit-view',compact('product'));

    }

    //funkcija za izvrsavanje updatea proizvoda na osnovu forme
    public function updateProduct(Request $request,$id){
        $name = $request->name;
        $price = $request->price;
        $amount = $request->amount;
        $description = $request->description;
        $id = $request->id;
        $userID = Auth::user()->id;

        $request->validate([
            'name'=>'required|string',
            'price'=>'required|numeric',
            'amount'=>'required|numeric',
            'description'=>'required|string'
        ]);

        DB::update('UPDATE product SET name= :name,price= :price,amount= :amount,description= :description,userID= :userID WHERE id= :id',['id' => $id,'name' => $name, 'price' => $price, 'amount' => $amount, 'description' => $description, 'userID' => $userID]);
        return redirect(route('shop'))->with('update','You have successfully edited the product!');
    }
}
