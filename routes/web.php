<?php

use App\Http\Controllers\Admin\AutheticatedAdminSession;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileClientController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.detail');
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/register', function () {
    return view('sign-up');
})->name('register');
Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot.password');
Route::get('/about-us', function () {
    return view('about-us');
})->name('about');

Route::get('/client', [\App\Http\Controllers\ClientController::class, 'index'])
    ->middleware(['auth', 'user-access:user'])
    ->name('dashboard.client');

Route::post('/client/{wishlist}/delete', [ClientController::class, 'remove_wishlist'])->name('remove.wishlist');
Route::delete('/client/{adresse}/delete', [ClientController::class, 'remove_adress'])->name('adress.delete');
Route::post('/client/add-profile/{user}', [ProfileClientController::class, 'update'])->name('profile.update');
Route::post('/client/address/store', [ClientController::class, 'store_address'])->name('address.store');
Route::post('/client/address/{adresse}/edit', [ClientController::class, 'update_adress'])->name('address.update');
Route::post('/client/profile/update/{user}', [ClientController::class, 'update_profile'])->name('profile.update');
Route::post('/client/login-detail/{user}', [ClientController::class, 'update_login_detail'])->name('login.detail');

Route::get('/whislist/{user}/{product}', [WishlistController::class, 'index'])
    ->middleware(['auth', 'user-access:user'])
    ->name('whislist.index');

// cart route
Route::post('/cart/store', [CartController::class, 'addToCart'])->name('sotre.cart');
Route::get('/cart/lists',  function () {
    return view('cart.list');
})->name('cart.list');
Route::get('/cart/content', [CartController::class, 'list'])->name('cart.content');
Route::post('/cart/delete/{id}', [CartController::class, 'removeCart'])->name('cart.delete');
Route::get('/cart/counts', [CartController::class, 'countCarts'])->name('cart.count');
Route::post('/cart/remove/{id}', [CartController::class, 'removeCart'])->name('cart.remove');
Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact');
Route::post('/cart/update/quantity/{id_cart}', [CartController::class, 'updateQuantity'])->name('cart.update.quantity');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

// create user avis
Route::post('/create/review', [ReviewController::class, 'store'])->name('review.store');

// socialite route
Route::get('/redirect/{provider}', [SocialiteController::class, 'redirect'])->name('socialite.redirect');
Route::get('/callback/{provider}', [SocialiteController::class, 'callback'])->name('socialite.callback');

Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('admin.auth.login');
    })->name('admin.login');
    Route::post('/login', [AutheticatedAdminSession::class, 'store'])->name('login.store');
});

Route::prefix('admin')
    ->middleware(['auth', 'user-access:admin'])
    ->group(function () {
        Route::get('/', function () {
            return view('admin.index');
        })
            ->name('admin.index');

        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products/delete{product}', [ProductController::class, 'destroy'])->name('product.delete');
        Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');

        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories/create', [CategoryController::class, 'store'])->name('categories.store');
        Route::post('/categories/delete/{category}', [CategoryController::class, 'destroy'])->name('categories.delete');
        Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/edit/{category}', [CategoryController::class, 'update'])->name('categories.update');

        Route::get('/attributes/create', [AttributeController::class, 'create'])->name('attribute.create');
        Route::get('/attributes', [AttributeController::class, 'index'])->name('attribute.index');
        Route::get('/attributes/edit/{attribute}', [AttributeController::class, 'edit'])->name('attribute.edit');
        Route::post('/attributes/delete/{attribute}', [AttributeController::class, 'destroy'])->name('attribute.destroy');

        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
        Route::get('users/delete/{user}', [UserController::class, 'destroy'])->name('user.destroy');

        Route::get('/roles/create', [AdminRoleController::class, 'create'])->name('roles.create');
        Route::get('/roles', [AdminRoleController::class, 'index'])->name('roles.index');
        Route::post('/roles/create', [AdminRoleController::class, 'store'])->name('roles.store');
        Route::get('/roles/edit/{role}', [AdminRoleController::class, 'edit'])->name('roles.edit');
        Route::post('/roles/delete/{role}', [AdminRoleController::class, 'destroy'])->name('roles.destroy');
    });

require __DIR__ . '/auth.php';
