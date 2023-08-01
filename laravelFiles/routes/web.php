<?php

use App\Http\Controllers\Coins;
use App\Http\Controllers\Notes;
use App\Http\Controllers\Histories;
use App\Http\Controllers\Shopping;
use App\Http\Controllers\Cart;
use App\Http\Controllers\StaticPages;
use App\Http\Controllers\PageLoader;
use App\Http\Controllers\Stamps;
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

Route::get('/', [PageLoader::class, 'home']);


// Coins info routes
Route::get('coins', [Coins::class, 'coin_countries']);
Route::get("coin/{slug}", [Coins::class, 'coin_country_periods']);
Route::get("coin/dynasty/{periodId}", [Coins::class, 'coin_dynasties']);
Route::get("coin/ruler/{dynastyId}", [Coins::class, 'coin_rulers']);
Route::get("coin/list/{rulerId}", [Coins::class, 'coin_list']);
Route::get("coin/detail/{coinId}", [Coins::class, 'coin_detail']);


//history routes 
Route::get('history', [Histories::class, 'history']);
Route::get("get-histories-dropdown-for-period", [Histories::class, 'get_histories_dropdown_for_period']);
Route::get("get-histories-grid-for-period", [Histories::class, 'get_histories_grid_for_period']);
Route::get('history/detail/{historySlug}', [Histories::class, 'history_detail']);



// Shopping routes
Route::get('shop', [Shopping::class, 'shop']);
Route::get('shop/list', [Shopping::class, 'shop_list']);


//Product  routes
Route::get('view-product', [Shopping::class, 'view_product']);


// Note info routes Routes
Route::get("notes", [Notes::class, 'note_countries']);
Route::get("note/{slug}", [Notes::class, 'note_country_periods']);
Route::get("note/dynasty/{periodId}", [Notes::class, 'note_dynasties']);
Route::get("note/note/{dynastyId}", [Notes::class, 'note_denominations']);
Route::get("note/list/{denominationUnit}/{dynastyId}", [Notes::class, 'note_list']);
Route::get("note/detail/{noteId}", [Notes::class, 'note_detail']);


// cart & checkout routes
Route::get('list-of-cart', [Cart::class, 'list_of_cart']);
Route::get('/checkout', [Cart::class, 'checkout']);
Route::get('payment', [Cart::class, 'payment']);


// Stamp info routes Routes
Route::get("stamp", [Stamps::class, 'stamp_periods']);
Route::get("stamp/dynasty/{periodId}", [Stamps::class, 'stamp_types']);
Route::get("stamp/list/{dynastyId}", [Stamps::class, 'stamp_list']);
Route::get("stamp/detail/{stampDetail}", [Stamps::class, 'stamp_detail']);
