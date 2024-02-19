<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductsController;

use App\Http\Controllers\OrderController;
// Route::get('api/signup',[ApiController::class,'register']);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::post('location/state/add',[LocationController::class, 'addState'])->name('location.state.add');
Route::get('/apartment', [ApartmentController::class, 'apartment'])->name('apartment');
Route::get('apartment/apartmentAdd', [ApartmentController::class, 'apartmentadd'])->name('apartmentAdd');
Route::get('/customerLists', [CustomerController::class, 'index'])->name('index');
Route::get('/products/productList', [ProductsController::class, 'index'])->name('index');
Route::get('/products/productsAdd', [ProductsController::class, 'productsadd'])->name('productsadd');
Route::post('/products/add',[ProductsController::class, 'add'])->name('products.add');
Route::get('/products/delete/{id}',[ProductsController::class, 'delete'])->name('product.delete');
Route::get('/products/edit/{id}',[ProductsController::class, 'edit'])->name('product.edit');
Route::post('/products/{id}/update', [ProductsController::class, 'update'])->name('product.update');
Route::group(['middleware' => 'auth'], function () {
	Route::get('location', [LocationController::class, 'location'])->name('location');
	Route::post('location/state/add',[LocationController::class, 'addState'])->name('location.state.add');
	Route::post('location/city/add',[LocationController::class, 'addCity'])->name('location.city.add');
	Route::post('location/area/add',[LocationController::class, 'addArea'])->name('location.area.add');
	Route::get('location/state/delete/{id}',[LocationController::class, 'deleteState'])->name('location.state.delete');
	Route::get('location/city/delete/{id}',[LocationController::class, 'deleteCity'])->name('location.city.delete');
	Route::get('location/area/delete/{id}',[LocationController::class, 'deleteArea'])->name('location.area.delete');
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('orders', [OrderController::class, 'Orders'])->name('Orders');

	Route::post('/updateorderstatus', [OrderController::class, 'updateOrderStatus']);
	Route::post('/send-email', [OrderController::class, 'updateOrderStatus']);

});
Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});
 

