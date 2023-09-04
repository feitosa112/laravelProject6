<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AdminCheckMiddleware;
use App\Models\CityForecastModel;
use App\Models\CityModel;
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


    //route za prikaz temperatura u gradovima
    Route::get('/temperatures',[CityController::class,'showTemperatures'])->name('temperaturesView');

    //route za prikaz forme za dodavanje novog grada
    Route::get('/add-city-view',[CityController::class,'addCityView'])->name('addCityView');
    //route za dodavanje unosa iz forme u bazu
    Route::post('/add-city',[CityController::class,'addCity'])->name('addCity');

    //route za brisanje grada na osnovu id broja
    Route::get('/delete-city/{id}',[CityController::class,'deleteCity'])->name('deleteCity');

    //route za prikaz forme za editovanje podataka o gradu na osnovu id broja
    Route::get('/edit-view/{id}',[CityController::class,'editView'])->name('editCity');

    //route za updateovanje podataka u bazi vezanih za grad i temperaturu
    Route::post('/update-city/{id}',[CityController::class,'updateCity'])->name('updateCity');

    //Route za prikaz prognoze za odredjini grad,za sledecih pet dana
    Route::get('/forecast/{id}',[ForecastController::class,'index'])->name('singelCity');

    //route za prikaz svih gradova napravljenih preko seeder fakera
    Route::get('/all-cities',[ForecastController::class,'allCities'])->name('allCities');

});

