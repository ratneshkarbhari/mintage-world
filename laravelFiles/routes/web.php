<?php

use App\Http\Controllers\Coins;
use App\Http\Controllers\Notes;
use App\Http\Controllers\Histories;
use App\Http\Controllers\PageLoader;
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

Route::get('/', [PageLoader::class,'home']);


// Coins info routes
Route::get('/coins', [Coins::class,'coin_countries']);
Route::get("/coin/{slug}", [Coins::class,'coin_country_periods']);
Route::get("/coin/dynasty/{periodId}", [Coins::class,'coin_dynasties']);
Route::get("/coin/ruler/{dynastyId}", [Coins::class,'coin_rulers']);
Route::get("coin/list/{rulerId}",[Coins::class,'coin_list']);
Route::get("coin/detail/{coinId}",[Coins::class,'coin_detail']);

//history routes
Route::get('/history', [Histories::class,'history']);

Route::get("/notes",[Notes::class,'note_countries']);