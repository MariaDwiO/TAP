<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::group(
    ['middleware' => 'auth:sanctum', 'prefix' => 'admin'],
    function () {
    
    Route::resource('dashboard', DashboardController::class); 
    Route::resource('category', CategoryController::class); 
    
    Route::resource('profile', ProfileController::class); 
    Route::GET('profile', [ProfileController::class, 'edit']); 
    Route::PUT('profile', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::resource('products', ProductController::class); 

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin/dashboard/index');
})->name('dashboard');
