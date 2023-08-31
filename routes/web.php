<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
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

Route::middleware('auth')->prefix('admin')->group(function(){

    Route::get('/add-product',[ProductController::class,'addProduct'])->name('addProduct');
    Route::post('/add',[ProductController::class,'addNewProduct'])->name('add');

    Route::get('/view-product/{id}',[ProductController::class,'viewProduct'])->name('viewProduct');
    Route::get('/delete-product/{id}',[ProductController::class,'deleteProduct'])->name('deleteProduct');

    Route::get('contact-us',[ContactController::class,'showContactForm'])->name('contactView');
    Route::post('send-msg',[ContactController::class,'sendMsg'])->name('sendMsg');

    Route::get('edit-product/{id}',[ProductController::class,'showEditForm'])->name('editView');
    Route::post('update-product/{id}',[ProductController::class,"updateProduct"])->name('update');
});

