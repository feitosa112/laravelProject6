<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserCitiesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

//Route group za ProductController izvan midlewarea
Route::controller(ProductController::class)->group(function(){
    Route::get('/','allProducts')->name('shop');
});



Route::middleware('auth')->prefix('admin')->group(function(){
    
    //Route group za ProductController u midlewareu
    Route::controller(ProductController::class)->name('product.')->prefix('/product')->group(function(){

        //route za prikaz forme za dodavanje novog proizvoda
        Route::get('/add-product','addProduct')->name('addView');

        //route za izvrsavanje dodavanja novog proizvoda
        Route::post('/add','addNewProduct')->name('add');

        //route za prikaz odredjenog proizvoda na osnovu id broja
        Route::get('/view/{id}','viewProduct')->name('view'); 

        //route za brisanje odredjenog proizvoda na osnovu id broja
        Route::get('/delete/{id}','deleteProduct')->name('delete');

        //route za formu za editovanje proizvoda
        Route::get('edit/{id}','showEditForm')->name('editView');

        //route za izvrsavanje updatea proizvoda
        Route::post('update/{id}',"updateProduct")->name('update');
    });



    //Route group za ContactController u midlewareu
    Route::controller(ContactController::class)->prefix('/contact')->group(function(){

        //route za formu za slanje poruke
        Route::get('contact-us','showContactForm')->name('contactView');

        //route za izvrsavanje slanja poruke
        Route::post('send-msg','sendMsg')->name('sendMsg');
    });



    //Route group za CityController u midlewareu
    Route::controller(CityController::class)->name('city.')->prefix('/city')->group(function(){

        //route za prikaz temperatura u gradovima
        Route::get('/temperatures','showTemperatures')->name('temperaturesView');

        //route za prikaz forme za dodavanje novog grada
        Route::get('/add-view','addCityView')->name('addCityView');

        //route za dodavanje unosa iz forme u bazu
        Route::post('/add','addCity')->name('add');

        //route za brisanje grada na osnovu id broja
        Route::get('/delete/{id}','deleteCity')->name('delete');

        //route za prikaz forme za editovanje podataka o gradu na osnovu id broja
        Route::get('/edit-view/{id}','editView')->name('edit');

        //route za updateovanje podataka u bazi vezanih za grad i temperaturu
        Route::post('/update/{id}','updateCity')->name('update');
    });


    //Route group za CityController u midlewareu
    Route::controller(ForecastController::class)->prefix('/forecast')->group(function(){

        //Route za search
        Route::get('/search',"search")->name('search');

        // Route za prikaz prognoze za odredjini grad,za sledecih pet dana
        Route::get('/{city:id}','singleCity')->name('singleCity');

        Route::post('/insert-temp','insert')->name('insertTemp');

    });

    //Route group za CityController u midlewareu
    Route::controller(UserCitiesController::class)->name('city.')->group(function(){

        //UserCities favorurite
        Route::get('/user-cities/favourite/{city}','favourite')->name('favourite');

        //Delete favourite
        Route::get('/user-cities/deleteFav/{city}','deleteFav')->name('deleteFav');
    });

    //route za prikaz svih gradova napravljenih preko seeder fakera
    Route::get('/all-cities',[ForecastController::class,'index'])->name('allCities');

    Route::get('/todays-exchange-rate',[CurrencyController::class,'todaysExchangeRate'])->name('todaysExchangeRate');



    

});

