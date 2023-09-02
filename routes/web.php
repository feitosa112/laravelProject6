<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AdminCheckMiddleware;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[ProductController::class,"allProducts"])->name('shop');

Route::middleware(['auth',AdminCheckMiddleware::class])->prefix('admin')->group(function(){

    //route za prikaz forme za dodavanje novog proizvoda
    Route::get('/add-product',[ProductController::class,'addProduct'])->name('addProduct');

    //route za izvrsavanje dodavanja novog proizvoda
    Route::post('/add',[ProductController::class,'addNewProduct'])->name('add');

    //route za prikaz odredjenog proizvoda na osnovu id broja
    Route::get('/view-product/{id}',[ProductController::class,'viewProduct'])->name('viewProduct');

    //-----------------------------------------------------------------------------------
    //route za brisanje odredjenog proizvoda na osnovu id broja
    Route::get('/delete-product/{id}',[ProductController::class,'deleteProduct'])->name('deleteProduct');

    //------------------------------------------------------------------------------------

    //route za formu za slanje poruke
    Route::get('contact-us',[ContactController::class,'showContactForm'])->name('contactView');

    //route za izvrsavanje slanja poruke 
    Route::post('send-msg',[ContactController::class,'sendMsg'])->name('sendMsg');

    //-------------------------------------------------------------------------------------

    //route za formu za editovanje proizvoda
    Route::get('edit-product/{id}',[ProductController::class,'showEditForm'])->name('editView');

    //route za izvrsavanje updatea proizvoda
    Route::post('update-product/{id}',[ProductController::class,"updateProduct"])->name('update');
});

