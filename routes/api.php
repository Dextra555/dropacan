<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiControllers\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/user/signup', [UserController::class, 'signup']);
Route::post('/user/login', [UserController::class, 'login']);
Route::post('/user/adminlogin', [UserController::class, 'adminlogin']);
Route::get('/locations/get_countries', [UserController::class, 'get_countries']);
Route::post('/locations/get_states', [UserController::class, 'get_states']);
Route::post('/locations/get_cities', [UserController::class, 'get_cities'])->name('get_cities');
Route::post('/locations/get_areas', [UserController::class, 'get_areas']);
Route::post('/locations/get_apartments', [UserController::class, 'get_apartments']);
Route::post('/customer/store', [UserController::class, 'store']);
Route::post('/get_apartments_insert', [UserController::class, 'get_apartments_insert'])->name('get_apartments_insert');
Route::post('/user/search', [UserController::class, 'search']);
Route::post('/user/uploadprofileimg',[UserController::class,'uploadprofileimg']);
Route::post('/user/otpOperation',[UserController::class,'otpOperation']);
Route::post('/user/forgotpassword',[UserController::class,'forgotpassword']);
Route::post('/user/productsDetails',[UserController::class,'productsDetails']);
Route::post('/user/reviewData',[UserController::class,'reviewData']);
Route::post('/user/orders',[userController::class,'orders']);

 























