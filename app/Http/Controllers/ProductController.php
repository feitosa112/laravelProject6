<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\CurrencyModel;
use App\Models\ProductModel;
use App\Repositories\ProductRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    private $productRepo;

    public function __construct() {
        $this->productRepo = new ProductRepository();
    }
    //funkcija za prikaz svih proizvoda na welcome stranici
    public function allProducts()
    {
        $allProducts = ProductModel::all();

        $todaysExchangeRate = CurrencyModel::whereDate('created_at',Carbon::now())->get();

        return view('/welcome', compact('allProducts','todaysExchangeRate'));
    }

    //funkcija za prikaz forme za dodavanje novog proizvoda
    public function addProduct()
    {
        return view('products.addView');
    }




    //funkcija za unos novog proizvoda preko forme
    public function addNewProduct(SaveProductRequest $request)
    {
        // dd($request->all());
        $this->productRepo->createNew($request);

        return redirect(route('shop'))->with('addProduct', 'You have successfully add product!');
    }





    //funkcija za prikaz odredjenog proizvoda na osnovu id broja
    public function viewProduct($id)
    {
        $product = ProductModel::find($id);
        return view('products.singleProduct', compact('product'));
    }





    //funkcija za brisanje odredjenog proizvoda
    public function deleteProduct($id)
    {
        $product = $this->productRepo->findId($id);
        if ($product == null) {
            echo "Ovaj product ne postoji";
        } else {
            $product->delete();
        }
        return redirect()->back()->with('deleteProduct', 'Product deleted!!');
    }





    //funkcija za prikaz forme za editovanje proizvoda
    public function showEditForm($id)
    {
        $product = ProductModel::find($id);
        return view('products.edit-view', compact('product'));

    }




    //funkcija za izvrsavanje updatea proizvoda na osnovu forme
    public function updateProduct(UpdateProductRequest $request, $id)
    {
        
        $this->productRepo->updateRepo($request , $id);

        return redirect(route('shop'))->with('update', 'You have successfully edited the product!');
    }
}
