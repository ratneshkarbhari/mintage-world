<?php

use App\Http\Controllers\Authentication;
use App\Http\Controllers\Coins;
use App\Http\Controllers\Notes;
use App\Http\Controllers\Histories;
use App\Http\Controllers\Shopping;
use App\Http\Controllers\Cart;
use App\Http\Controllers\InfoComments;
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

Route::get("coin-info-filter-exe",[Coins::class,"info_filter_exe"]);
Route::get("note-info-filter-exe",[Notes::class,'note_info_filter_exe']);
Route::get('stamp-info-filter-exe',[Stamps::class,'stamp_info_filter_exe']);

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



// Static Pages & other pages routes
Route::get('content/about-us/', [StaticPages::class, 'about_us']);
Route::get('content/disclaimer/', [StaticPages::class, 'disclaimer']);
Route::get('content/privacy/', [StaticPages::class, 'privacy_policy']);
Route::get('content/term/', [StaticPages::class, 'terms_of_use']);
Route::get('content/return/', [StaticPages::class, 'return_policy']);
Route::get('content/career/', [StaticPages::class, 'career']);
Route::get('content/sitemap/', [StaticPages::class, 'sitemap']);
Route::get('story/', [StaticPages::class, 'story']);
Route::get('content/photopro/', [StaticPages::class, 'photopro']);
Route::get('videos/', [StaticPages::class, 'videos']);
Route::get('videos/detail/', [StaticPages::class, 'videos_detail']);
Route::get('content/courtesy/', [StaticPages::class, 'courtesy']);
Route::get('contact/', [StaticPages::class, 'contact_us']);
Route::get('application/login', [StaticPages::class, 'login']);
Route::get('member', [StaticPages::class, 'member']);
Route::get('member/forgotpassword/', [StaticPages::class, 'forgotpassword']);
Route::get('member/upgrademembership', [StaticPages::class, 'upgrademembership']);
Route::get('member/dashboard/', [StaticPages::class, 'dashboard']);
Route::get('member/change-password/', [StaticPages::class, 'change_password']);
Route::get('member/myorders/', [StaticPages::class, 'myorders']);
Route::get('event/', [StaticPages::class, 'event']);
Route::get('media/', [StaticPages::class, 'media']);
Route::get('media-coverage/', [StaticPages::class, 'media_coverage']);


Route::get('knowledge-base/', [StaticPages::class, 'knowledge_base']);
Route::get('knowledge-base/know-your-coins/', [StaticPages::class, 'know_your_coins']);
Route::get('knowledge-base/governors-of-reserve-bank-of-india/', [StaticPages::class, 'governors_india']);
Route::get('knowledge-base/signatory-of-finance-secretary/', [StaticPages::class, 'signatory_finance_secretary']);
Route::get('knowledge-base/note-numbering-system/', [StaticPages::class, 'note_numbering_system']);
Route::get('knowledge-base/security-features-on-current-banknotes/', [StaticPages::class, 'security_features_on_current_banknotes']);
Route::get('knowledge-base/security-features-on-demonetized-banknotes/', [StaticPages::class, 'security_features_on_demonetized_banknotes']);
Route::get('knowledge-base/know-your-stamps', [StaticPages::class, 'know_your_stamps']);



// Auth routes
Route::post("member-login-exe", [Authentication::class, 'member_login']);
Route::get("logout", [Authentication::class, 'logout']);
Route::post("admin-login-exe",[Authentication::class,'admin_login']);

// Info comments
Route::post("create-info-comment",[InfoComments::class,'create_exe']);


// Admin Section
Route::get("admin-login",[PageLoader::class, 'admin_login']);
