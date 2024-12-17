<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{HomeController, ProductsController, OrdersController, BlogController, OrdersLangsungController, DashboardController, LoginController, RegisterController, ArtikelController};

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
    Route::get('/checkout', [ProductsController::class, 'indexCheckout'])->name('produk.checkout');
    Route::post('/checkout', [ProductsController::class, 'indexPostCheckout'])->name('produk.to.checkout');
    Route::post('/checkout/create', [ProductsController::class, 'storeCheckout'])->name('produk.checkout.create');
    
    Route::get('/indramedia', [ProductsController::class, 'indexProductIndramedia'])->name('produk.indramedia');
    Route::get('/indramedia/{id}', [ProductsController::class, 'indexProductIndramediaDetail'])->name('produk.indramedia.detail');
    
    Route::get('/endez', [ProductsController::class, 'indexProductEndez'])->name('produk.endez');   
    Route::get('/endez/{id}', [ProductsController::class, 'indexProductEndezDetail'])->name('produk.endez.detail');
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
Route::prefix('dashboard')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    
    Route::prefix('orders')->group(function() {
       Route::get('/', [DashboardController::class, 'indexOrders'])->name('dashboard.orders');
    });
    
    Route::prefix('products')->group(function() {
       Route::get('/', [DashboardController::class, 'indexProducts'])->name('dashboard.products');
       
       Route::get('/type', [DashboardController::class, 'indexProductsType'])->name('dashboard.products.type');
       
       Route::get('/category', [DashboardController::class, 'indexProductsCategory'])->name('dashboard.products.category');
    });
    
    Route::prefix('promo')->group(function() {
       Route::get('/', [DashboardController::class, 'indexPromo'])->name('dashboard.promo');
    });
    
    Route::get('/users', [DashboardController::class, 'indexUsers'])->name('dashboard.users');
    
    Route::get('/blog', [DashboardController::class, 'indexBlog'])->name('dashboard.blog');
})->middleware(['auth', 'admin', 'developer']);

// Route artikel
Route::prefix('artikel')->group(function() {
    Route::get('/', [ArtikelController::class, 'index'])->name('artikel');
    
    Route::get('/{id}', [ArtikelController::class, 'indexDetail'])->name('artikel.detail');
});

// Route authentication
Route::prefix('auth')->group(function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    
    Route::get('/logout', function() {
        return redirect()->route('login');
    })->name('logout');
});