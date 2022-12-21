<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\FormController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontendController::class,'index']);
Route::get('/shop',[FrontendController::class,'shop']);
Route::get('/shopDetails',[FrontendController::class,'shopDetails']);
Route::get('/cart',[FrontendController::class,'cart']);
Route::get('/checkout',[FrontendController::class,'checkout']);
Route::get('/contact',[FrontendController::class,'contact']);


Route::get('/registration_form',[RegistrationController::class,'create']);
Route::post('/registration_store',[RegistrationController::class,'store']);
Route::get('/view_data',[RegistrationController::class,'index']);
Route::get('/edit_data/{id}',[RegistrationController::class,'edit']);
Route::post('/registration_update/{id}',[RegistrationController::class,'update']);
Route::get('/delete_data/{id}',[RegistrationController::class,'delete']);

Route::get('/std_form',[FormController::class,'create']);
Route::post('/form_store',[FormController::class,'store']);



