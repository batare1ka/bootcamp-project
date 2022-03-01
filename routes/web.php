<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\api\ArticleApiController;
use App\Http\Controllers\api\BrandApiController;
use App\Http\Controllers\api\CategoryApiController;
use App\Http\Controllers\api\HomeApiController;
use App\Http\Controllers\api\ShopApiController;
use App\Http\Controllers\ArticleCommentsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;

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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/product/{id}', [ShopController::class, 'showProduct'])->name('product')->where('id', '\b\d{0,10}\b');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/article/create', [BlogController::class, 'create']);
Route::get('/blog/article/update/{id}', [BlogController::class, 'update']);
Route::get('blog/article/{id}', [BlogController::class, 'showArticle'])->name('article')
->where('id', '\b\d{0,10}\b');
Route::get('/blog/{article}/comments', [ArticleCommentsController::class, 'store']);

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contactUs', [ContactController::class, 'send'])->name('contactUs.send')
->middleware('log.activity:sendContactUs');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/checkout', [CheckoutController::class, 'index']);

Route::get('/register', [RegisterController::class, 'create'])->middleware("guest");
Route::post('/register', [RegisterController::class, 'store'])->middleware("guest");

Route::get('/login', [SessionController::class, 'create'])->middleware("guest");
Route::post('/login', [SessionController::class, 'store'])->middleware("guest");

Route::post('/logout', [SessionController::class, 'destroy'])->middleware("auth");

Route::put('/api/articles/{id}', [ArticleApiController::class, 'updateAnArticle']);
Route::post('/api/articles/',  [ArticleApiController::class, 'createArticle']);
Route::get('/api/articles/most-popular',  [ArticleApiController::class, 'readMostPopular']);

Route::get('/api/products/',  [ShopApiController::class, 'readProducts']);
Route::get('/api/search-products/',  [ShopApiController::class, 'searchProducts']);
Route::get('/api/search-suggestions/',  [ShopApiController::class, 'searchSuggestions']);

Route::get('/api/suggested-products/',  [HomeApiController::class, 'suggestedProducts']);

Route::get('/api/brands/',  [BrandApiController::class, 'readBrands']);
Route::get('/api/categories/',  [CategoryApiController::class, 'readCategories']);
