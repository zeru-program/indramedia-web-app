<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{HomeController, ProductsController, OrdersController, BlogController, OrdersLangsungController, DashboardController, LoginController, RegisterController, ArtikelController, DashboardBlogController, DashboardCategoryController, DashboardOrdersController, DashboardPopularController, DashboardProductsController, DashboardPromoController, DashboardTypeController, DashboardUserController, DashboardUsersController, MasterController};
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Container\Attributes\Auth;

// Route home index
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route about us atau tentang kami
Route::get('/tentang-kami', function () {
    return view('landing-pages.about');
})->name('tentang-kami');

// Route contact us atau hubungi kami
Route::get('/hubungi-kami', function () {
    return view('landing-pages.contact');
})->name('hubungi-kami');

// Route Prefix products
Route::prefix('produk')->group(function() {
    Route::get('/', [ProductsController::class, 'indexProduct'])->name('produk.index');
    
    Route::get('/indramedia', [ProductsController::class, 'indexProductIndramedia'])->name('produk.indramedia');
    Route::get('/indramedia/{id}', [ProductsController::class, 'indexProductIndramediaDetail'])->name('produk.indramedia.detail');
    Route::post('/indramedia/create', [ProductsController::class, 'indexProductIndramediaCreate'])->name('produk.indramedia.create');
    
    Route::get('/endez', [ProductsController::class, 'indexProductEndez'])->name('produk.endez');   
    Route::get('/endez/{id}', [ProductsController::class, 'indexProductEndezDetail'])->name('produk.endez.detail');
    Route::post('/endez/create', [ProductsController::class, 'indexProductEndezCreate'])->name('produk.endez.create');
});

// Route tracking order
Route::get("/lacak-pesanan", function() {
    return view('orders.tracking-order');
})->name("lacak-pesanan");

// Route orders
Route::prefix('order')->group(function() {
    Route::get('/', function() {
        return redirect()->route('lacak-pesanan');
    });
    
    Route::get('/{id}', [OrdersController::class, 'orderDetail'])->name('order.detail');
});

// Route dashboard
Route::middleware(AdminMiddleware::class)->prefix('dashboard')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    
    Route::prefix('orders')->group(function() {
       Route::get('/', [DashboardOrdersController::class, 'indexOrders'])->name('dashboard.orders');
       Route::post('/create', [DashboardOrdersController::class, 'postOrders'])->name('dashboard.orders.post');
       Route::put('/edit/{id}', [DashboardOrdersController::class, 'editOrders'])->name('dashboard.orders.edit');
       Route::delete('/delete/{id}', [DashboardOrdersController::class, 'deleteOrders'])->name('dashboard.orders.delete');
       Route::get('/export', [DashboardOrdersController::class, 'exportOrders'])->name('dashboard.orders.export');
    });
    
    Route::prefix('products')->group(function() {
       Route::get('/', [DashboardProductsController::class, 'indexProducts'])->name('dashboard.products');
       Route::post('/create', [DashboardProductsController::class, 'postProducts'])->name('dashboard.products.post');
       Route::put('/edit/{id}', [DashboardProductsController::class, 'editProducts'])->name('dashboard.products.edit');
       Route::delete('/delete/{id}', [DashboardProductsController::class, 'deleteProducts'])->name('dashboard.products.delete');
       Route::post('/import', [DashboardProductsController::class, 'importProducts'])->name('dashboard.products.import');
       Route::get('/export', [DashboardProductsController::class, 'exportProducts'])->name('dashboard.products.export');
       
       Route::get('/type', [DashboardTypeController::class, 'indexProductsType'])->name('dashboard.products.type');
       Route::post('/type/create', [DashboardTypeController::class, 'postProductsType'])->name('dashboard.products.type.post');
       Route::put('/type/edit/{id}', [DashboardTypeController::class, 'editProductsType'])->name('dashboard.products.type.edit');
       Route::delete('/type/delete{id}', [DashboardTypeController::class, 'deleteProductsType'])->name('dashboard.products.type.delete');
       
       Route::get('/category', [DashboardCategoryController::class, 'indexProductsCategory'])->name('dashboard.products.category');
       Route::post('/category/create', [DashboardCategoryController::class, 'postProductsCategory'])->name('dashboard.products.category.post');
       Route::put('/category/edit/{id}', [DashboardCategoryController::class, 'editProductsCategory'])->name('dashboard.products.category.edit');
       Route::delete('/category/delete{id}', [DashboardCategoryController::class, 'deleteProductsCategory'])->name('dashboard.products.category.delete');
    });
    
    Route::prefix('popular')->group(function() {
       Route::get('/', [DashboardPopularController::class, 'indexPopular'])->name('dashboard.popular');
       Route::post('/create', [DashboardPopularController::class, 'postPopular'])->name('dashboard.popular.post');
       Route::put('/edit/{id}', [DashboardPopularController::class, 'editPopular'])->name('dashboard.popular.edit');
       Route::delete('/delete/{id}', [DashboardPopularController::class, 'deletePopular'])->name('dashboard.popular.delete');
    });

    Route::prefix('promo')->group(function() {
       Route::get('/', [DashboardPromoController::class, 'indexPromo'])->name('dashboard.promo');
       Route::post('/create', [DashboardPromoController::class, 'postPromo'])->name('dashboard.promo.post');
       Route::delete('/delete/{id}', [DashboardPromoController::class, 'deletePromo'])->name('dashboard.promo.delete');
       Route::put('/edit/{id}', [DashboardPromoController::class, 'editPromo'])->name('dashboard.promo.edit');
    });
    
    Route::get('/artikel', [DashboardBlogController::class, 'indexBlog'])->name('dashboard.blog');
    
    // Route::get('/users', [DashboardUsersController::class, 'indexUsers'])->name('dashboard.users');
    Route::prefix('users')->group(function() {
       Route::get('/', [DashboardUsersController::class, 'indexUsers'])->name('dashboard.users');
       Route::post('/create', [DashboardUsersController::class, 'postUsers'])->name('dashboard.users.post');
       Route::delete('/delete/{id}', [DashboardUsersController::class, 'deleteUsers'])->name('dashboard.users.delete');
       Route::put('/edit/{id}', [DashboardUsersController::class, 'editUsers'])->name('dashboard.users.edit');
    });
});

// Route API
Route::prefix('master')->group(function() {
    Route::get('/get-products', [MasterController::class, 'getProducts'])->name('master.products');
    Route::get('/get-orders', [MasterController::class, 'getOrders'])->name('master.orders');
    Route::get('/get-type', [MasterController::class, 'getType'])->name('master.type');
    Route::get('/get-category', [MasterController::class, 'getCategory'])->name('master.category');
    Route::get('/get-promo', [MasterController::class, 'getPromo'])->name('master.promo');
    Route::get('/get-populer', [MasterController::class, 'getPopular'])->name('master.popular');
});
// Route API


// Route artikel
Route::prefix('artikel')->group(function() {
    Route::get('/', [ArtikelController::class, 'index'])->name('artikel');
    
    Route::get('/{id}', [ArtikelController::class, 'indexDetail'])->name('artikel.detail');
});

// Route authentication
Route::prefix('auth')->group(function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'post'])->name('login.post');
    
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'post'])->name('register.post');
    
    Route::get('/logout', function() {
        Auth::logout();
        return redirect()->route('home');
    })->name('logout');
});