<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\UserController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CategoryController;



Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('home.dashboard');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/home-page', [AuthController::class, 'HomeView']);
Route::get('/home-product_details/{id}', [AuthController::class, 'HomeProductDetails'])->name('home.productdetails');

// Route::middleware(['auth'])->group(function () {

    Route::get('load-cart', [CartController::class, 'CartCount'])->name('cart.count');
    Route::post('add-to-cart', [CartController::class, 'AddToCart'])->name('cart.addtocart');
    // Route::post('/send-cart-whatsapp', [CartController::class, 'sendCartToWhatsApp']);


// });


 //BACKEND
 Route::get('/', [AdminController::class, 'LoginView'])->name('login.view');
 Route::post('/loginn', [AdminController::class, 'Login'])->name('loginn');
//  Route::middleware(['admin'])->group(function () {
 Route::get('/admin-dashboard', [AdminController::class, 'View'])->name('admin.admin-dashboard');
 Route::get('/logoutt', [AdminController::class, 'Logout'])->name('logoutt');
// });

//  CATEGORY
Route::get('/categories', [CategoryController::class, 'AllCategory'])->name('category.all');
Route::get('/add_category', [CategoryController::class, 'AddCategory'])->name('category.add');
Route::post('/store_category', [CategoryController::class, 'StoreCategory'])->name('category.store');
Route::get('/edit_category', [CategoryController::class, 'EditCategory'])->name('category.edit');
Route::post('/update_category/{id}', [CategoryController::class, 'UpdateCategory'])->name('category.update');
Route::get('/delete_category/{id}', [CategoryController::class, 'DeleteCategory'])->name('category.delete');

//PRODUCTS
Route::get('/product', [ProductController::class, 'AllProduct'])->name('product.all');
Route::get('/add_product', [ProductController::class, 'AddProduct'])->name('product.add');
Route::post('/store_product', [ProductController::class, 'StoreProduct'])->name('product.store');
Route::get('/edit_product', [ProductController::class, 'EditProduct'])->name('product.edit');
Route::post('/update_product/{id}', [ProductController::class, 'UpdateProduct'])->name('product.update');
Route::get('/delete_product/{id}', [ProductController::class, 'DeleteProduct'])->name('product.delete');
