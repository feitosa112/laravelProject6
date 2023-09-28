<?php

namespace App\Repositories;

use App\Models\ProductModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductRepository {

    private $productModel;

     public function __construct() {
        $this->productModel = new ProductModel();
    }

    public function createNew($request){
        $this->productModel->create([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'amount' => $request->get('amount'),
            'description' => $request->get('description'),
            'userID' => Auth::user()->id
        ]);
    }

    public function findId($id){
       return $this->productModel->where(['id'=>$id])->first();
    }

    public function updateRepo($request , $id){
        $name = $request->name;
        $price = $request->price;
        $amount = $request->amount;
        $description = $request->description;
        $id = $request->id;
        $userID = Auth::user()->id;

        DB::update('UPDATE product SET name= :name,price= :price,amount= :amount,description= :description,userID= :userID WHERE id= :id', ['id' => $id, 'name' => $name, 'price' => $price, 'amount' => $amount, 'description' => $description, 'userID' => $userID]);

    }
}