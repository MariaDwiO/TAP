<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\TemplatController;
use App\Http\Controllers\TampilanController;

use App\Models\Product;
use App\Models\Category;
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
//     return view('');
// });

// Route::get('/', function () {
//     $products = Product::orderBy('created_at', 'DESC')->get();
//     $category = Category::all();

//     return view('index', compact('products', 'category'));
// });

Route::get('/', [TemplatController::class, 'index']);
Route::get('products', [TemplatController::class, 'index']);
Route::get('search', [TemplatController::class, 'search']);
Route::get('product-category/{category}', [TemplatController::class, 'category'])->name('product-category.category');
Route::get('products/{slug}', [TemplatController::class, 'show']);

Route::group(
    ['middleware' => 'auth:sanctum', 'prefix' => 'admin'],
    function () {

        Route::resource('dashboard', DashboardController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('products', ProductController::class);

        Route::resource('profile', ProfileController::class);
        Route::GET('profile', [ProfileController::class, 'edit']);
        Route::PUT('profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
    }
);

Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
    $products = Product::orderBy('created_at', 'ASC')->latest()->paginate(3);
    return view('admin/dashboard/index', compact('products'));
})->name('dashboard');
