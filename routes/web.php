<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\api\ArticleApiController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

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
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/article/create', [BlogController::class, 'create']);
Route::get('/blog/article/update/{id}', [BlogController::class, 'update']);
Route::get('blog/article/{id}', [BlogController::class, 'showArticle'])->name('article')
->where('id', '\b\d{0,10}\b');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contactUs', [ContactController::class, 'send'])->name('contactUs.send')
->middleware('log.activity:sendContactUs');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/product/{id}', [ProductController::class, 'index'])->name('product')->where('id', '\b\d{0,10}\b');
Route::put('/api/articles/{id}', [ArticleApiController::class, 'updateAnArticle']);
Route::post('/api/articles/',  [ArticleApiController::class, 'createArticle']);
Route::get('/api/articles/most-popular',  [ArticleApiController::class, 'readMostPopular']);
