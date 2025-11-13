<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Middleware\AuthMiddleware;
use App\Mail\WelcomeMail;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    Mail::to('dipeshkhanal79@gmail.com')->queue(new WelcomeMail());
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });
Route::get('/dashboard', [DashboardController::class, 'homeshow'])->name('dashoard.show')->middleware('auth');

Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [LoginController::class, 'register'])->name('register.submit');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post(('/logout'), [LoginController::class, 'logout'])->name('logout');

Route::get('/createproduct', [CustomerController::class, 'index'])->name('createproduct.index');
Route::post('/createproduct', [CustomerController::class, 'store'])->name('products.store');

//edit
Route::get('/products/{id}/edit', [CustomerController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}/update', [CustomerController::class, 'update'])->name('products.update');

//show
Route::get('/productlist', [CustomerController::class, 'show'])->name('productlist');

Route::delete('/products/{id}', [CustomerController::class, 'destroy'])->name('products.remove');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Category
Route::get('/createcategory', [CategoryController::class, 'categoryindex'])->name('category.index')->middleware(AuthMiddleware::class);
Route::post('/createcategory', [CategoryController::class, 'categorystore'])->name('category.store');

Route::get('/editcategory/{id}/edit', [CategoryController::class, 'categoryedit'])->name('category.edit');
Route::put('/editcategory/{id}/update', [CategoryController::class, 'categoryupdate'])->name('category.update');

Route::get('/categorylist', [CategoryController::class, 'categoryshow'])->name('categorylist');

Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.remove');

//cart
Route::get('/cart', [CartController::class, 'cartindex'])->name('cart.index');
Route::post('/cart/add/', [CartController::class, 'cartadd'])->name('cart.add')->middleware('auth');
Route::get('/cartlist', [CartController::class, 'cartshow'])->name('cart.show');

Route::delete('/cart/remove/{id}', [CartController::class, 'cartremove'])->name('cart.remove');

Route::delete('/cart/clear', [CartController::class, 'cartclear'])->name('cart.clear');

//checkout
// Route::get('/checkout', function () {
//     return view('checkout');
// })->name('checkout')->middleware('auth');


Route::get('/checkout', [CartController::class, 'checkoutshow'])->name('checkout.index')->middleware('auth');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::post('/checkout/success', [CartController::class, 'checkoutSuccess'])->name('checkout.success')->middleware('auth');

Route::get('/cart/count', [CartController::class, 'Cartcount'])->name('cart.count')->middleware('auth');

// Route::get('/admin/dashboard', [CustomerController::class, 'adminshow'])->name('admin.show')->middleware(AuthMiddleware::class);

Route::middleware([
'auth','adminauth'])->group(function (){
        Route::get('/admin/dashboard', [CustomerController::class, 'adminshow'])->name('admin.show');

});

Route::post('/cart/store/', [CartController::class, 'cartstore'])->name('cart.store')->middleware('auth');