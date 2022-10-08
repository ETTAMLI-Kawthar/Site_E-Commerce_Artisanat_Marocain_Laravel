<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\FactureController;
use App\Http\Controllers\Admin\FrontedController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\CommandeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\CartsController;
use App\Http\Controllers\User\LivraisonController;
use App\Http\Controllers\Admin\CommandesController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\GestionlivraisonController;

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


Route::get('/',[FrontendController::class, 'index']);

Route::get('product/{prod_lib}',[FrontendController::class, 'productview']);
Route::get('products/{prod_lib}',[UserController::class, 'productview']);
Route::get('commande',[UserController::class, 'commandes']);
Route::get('voir-commande/{id}',[UserController::class, 'voir']);
Route::get('contact',[UserController::class, 'contact']);
Route::post('Message',[UserController::class, 'message']);

Route::get('pdf/{id}',[FactureController::class, 'pdf']);

Auth::routes();

Route::get('/home', [UserController::class, 'index'])->name('home');
Route::get('page_user','User\UserController@index');
Route::get('select-cat/{id}',[UserController::class, 'selectProd']);

Route::post('add_to_cart',[CartsController::class, 'addToCarts']);
Route::post('addtocart',[FrontendController::class, 'addToCarts']);

Route::get('panier',[CartsController::class,'viewcart']);
Route::get('delete-cart-item/{id}',[CartsController::class,'deleteprod']);
Route::post('update-cart/{id}',[CartsController::class,'updateCart']);
Route::get('commander',[CommandeController::class,'index']);
Route::post('payer',[CommandeController::class,'payer']);


Route::get('About',[FrontendController::class, 'about']);
Route::get('Contact',[FrontendController::class, 'contact']);

Route::get('select-prod-cat/{id}',[FrontendController::class, 'selectProd']);

Route::post('message',[DashboardController::class, 'message']);




Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard','Admin\FrontedController@index');
    Route::get('product','Admin\ProductController@index');
    Route::get('add-product','Admin\ProductController@add');
    Route::post('insert-product','Admin\ProductController@insert');
    Route::get('edit-product/{id}',[ProductController::class, 'edit']);
    Route::put('update-product/{id}',[ProductController::class, 'update']);
    Route::get('delete-product/{id}',[ProductController::class, 'delete']);
    Route::get('stock',[ProductController::class, 'stock']);
    Route::get('edit-stock/{id}',[ProductController::class, 'editstock']);
    Route::post('update-stock/{id}',[ProductController::class, 'updatestock']);

    Route::get('categorie','Admin\CategoryController@index');
    Route::get('add-categorie',[CategoryController::class, 'add']);
    Route::post('insert-category','Admin\CategoryController@insert');
    Route::get('edit-category/{id}',[CategoryController::class, 'edit']);
    Route::put('update-category/{id}',[CategoryController::class, 'update']);


    Route::get('orders', [CommandesController::class, 'index']);
    Route::get('admin/voir-commande/{id}', [CommandesController::class, 'view']);
    Route::put('update-orders/{id}', [CommandesController::class, 'updateCommande']);
    Route::get('order-history', [CommandesController::class, 'commandehistory']);


    Route::get('users', [DashboardController::class, 'users']);
    Route::get('view-users/{id}', [DashboardController::class, 'viewusers']);
    Route::get('profile', [DashboardController::class,'profile']);
    Route::post('update-profile', [DashboardController::class,'updateprofile']);
    Route::get('messageUser', [DashboardController::class, 'messageUser']);


});
