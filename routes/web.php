<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\WishlistController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\PaypmentController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\backend\RequestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SearchController;


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

/*Route::get('/', function () {
    return view('welcome');
});*/


Auth::routes();

Route::get('/',[FrontendController::class,'index']);
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('frontend',[FrontendController::class,'index']);
Route::get('/home', [FrontendController::class,'index'])->name('home');

Route::middleware(['auth','isAdmin'])->group(function(){

    /*Route::get('dashboard', function () {
        return view('backend.dashboard');
    });*/


    Route::get('/show-category',[CategoryController::class,'showcategory']);
    Route::get('/add-category',[CategoryController::class,'addcategory']);
    Route::post('/insert-category',[CategoryController::class,'insertcategory']);
    Route::get('/edit-category/{id}',[CategoryController::class,'editcategory']);
    Route::put('/update-category/{id}',[CategoryController::class,'updatecategory']);
    Route::get('/delete-category/{id}',[CategoryController::class,'deletecategory']);


    Route::get('/show-product',[productController::class,'showproduct']);
    Route::get('/add-product',[ProductController::class,'addproduct']);
    Route::post('/insert-product',[ProductController::class,'insertproduct']);
    Route::get('/edit-product/{id}',[productController::class,'editproduct']);
    Route::put('/update-product/{id}',[ProductController::class,'updateproduct']);
    Route::get('/delete-product/{id}',[productController::class,'deleteproduct']);



    Route::get('/show-user',[UserController::class,'showuser']);
    Route::get('/edit-user/{id}',[UserController::class,'edituser']);
    Route::put('/update-user/{id}',[UserController::class,'updateuser']);
    Route::get('/delete-user/{id}',[UserController::class,'deleteuser']);


    Route::get('/dashboard',[DashboardController::class,'show']);



    Route::get('/show-request',[RequestController::class,'showorder']);
    Route::get('/conform-request/{id}',[RequestController::class,'conformorder']);
    Route::get('/delete-request/{id}',[RequestController::class,'deleteorder']);
    




});

Route::get('/show-category/{id}',[FrontendController::class,'showcategory']);
Route::get('/show-details/{id}',[FrontendController::class,'showdetails']);



Route::middleware(['auth'])->group(function(){


    Route::post('/add-to-cart',[CartController::class,'addtocart']);
    Route::get('/show-cart',[CartController::class,'showcart']);
    Route::post('/update-cart',[CartController::class,'updatecart']);
    Route::get('/delete-cart/{id}',[CartController::class,'deletecart']);


    Route::post('/add-to-wishlist',[WishlistController::class,'addtwishlist']);
    Route::get('/show-wishlist',[WishlistController::class,'showwishlist']);
    Route::post('/update-wishlist',[WishlistController::class,'updatewishlist']);
    Route::get('/delete-wishlist/{id}',[WishlistController::class,'deletewishlist']);



    Route::post('/checkout',[checkoutController::class,'checkout']);
   

    Route::post('/add-order',[OrderController::class,'addorder']);
    Route::get('/show-order',[OrderController::class,'showorder']);
    Route::get('/print_pdf/{id}',[OrderController::class,'print_pdf']);

    Route::get('/view-order/{id}',[OrderController::class,'vieworder']);
    Route::get('/print_order/{id}',[OrderController::class,'print_order']);



    Route::post('/payment',[PaypmentController::class,'pay'])->name('payment');


    Route::post('/add-rating',[RatingController::class,'addRating']);


    //Route::post('/show-order',[RatingController::class,'showorder']);
    




   

    

});

Route::post('/search',[SearchController::class,'search']);





