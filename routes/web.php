<?php

use App\Http\Controllers\CustomController;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('register',[CustomController::class,'register'])->name('user.register');
Route::get('login',[CustomController::class,'login'])->name('user.login');
Route::get('home',[CustomController::class,'home'])->name('user.home');

Route::post('register/data',[UserController::class,'register'])->name('user.reg');
Route::get('login/data',[UserController::class,'authenticated'])->name('user.log');


Route::group(['prefix'=>'admin', 'middleware' => ['auth','isAdmin']], function () {
    Route::get('dashboard',[CustomController::class,'dashboard'])->name('user.dashboard');
    // Route::get('/dashboard', function () {
    //    return view('admin.dashboard');
    // });

 });
