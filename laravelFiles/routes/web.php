<?php

use App\Models\Coin;
use App\Models\Stamp;
use App\Models\MediaCoverage;
use App\Models\ProductRating;
use App\Http\Controllers\News;
use App\Http\Controllers\AwsS3;
use App\Http\Controllers\Coins;
use App\Http\Controllers\Notes;
use App\Http\Controllers\Utils;
use Dflydev\DotAccessData\Util;
use App\Http\Controllers\Events;
use App\Http\Controllers\Orders;
use App\Http\Controllers\Stamps;
use App\Http\Controllers\Banners;
use App\Http\Controllers\Coupons;
use App\Http\Controllers\Members;
use App\Http\Controllers\Periods;
use App\Http\Controllers\Products;
use App\Http\Controllers\Shopping;
use App\Http\Controllers\Countries;
use App\Http\Controllers\Histories;
use App\Http\Controllers\EmailTests;
use App\Http\Controllers\PageLoader;
use App\Http\Controllers\CartActions;
use App\Http\Controllers\StaticPages;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoComments;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\BulkUploadController;
use App\Http\Controllers\MediaCoverages;
use App\Http\Controllers\ProductRatings;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ShoppingCategories;

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

Route::post("update-profile-exe", [Members::class, 'update_profile']);


Route::group(['middleware' => ['slashes']], function () {

    Route::get('/', [PageLoader::class, 'home']);


    // Coins info routes
    Route::get('coins', [Coins::class, 'coin_countries']);
    Route::get("coin/{slug}", [Coins::class, 'coin_country_periods']);
    Route::get("coin/dynasty/{periodId}", [Coins::class, 'coin_dynasties']);
    Route::get("coin/ruler/{dynastyId}", [Coins::class, 'coin_rulers']);
    Route::get("coin/detail/{coinId}", [Coins::class, 'coin_detail']);

    Route::get("coin-info-filter-exe", [Coins::class, "info_filter_exe"]);
    Route::get("note-info-filter-exe", [Notes::class, 'note_info_filter_exe']);
    Route::get('stamp-info-filter-exe', [Stamps::class, 'stamp_info_filter_exe']);

    //history routes 
    Route::get('history', [Histories::class, 'history']);
    Route::get("get-histories-dropdown-for-period", [Histories::class, 'get_histories_dropdown_for_period']);
    Route::get("get-histories-grid-for-period", [Histories::class, 'get_histories_grid_for_period']);
    Route::get('history/detail/{historySlug}', [Histories::class, 'history_detail']);



    // Shopping routes
    Route::get('shop', [Shopping::class, 'shop']);


    //Product  routes
    Route::get('view-product/{productSlug}', [Shopping::class, 'view_product']);


    // Note info routes Routes
    Route::get("notes", [Notes::class, 'note_countries']);
    Route::get("note/{slug}", [Notes::class, 'note_country_periods']);
    Route::get("note/dynasty/{periodId}", [Notes::class, 'note_dynasties']);
    Route::get("note/note/{dynastyId}", [Notes::class, 'note_denominations']);
    Route::get("note/detail/{noteId}", [Notes::class, 'note_detail']);


    // CartActions & checkout routes
    Route::get('cart', [CartActions::class, 'cart_page']);
    Route::get('/checkout', [CartActions::class, 'checkout']);
    Route::get('payment', [CartActions::class, 'payment']);



    // Stamp info routes Routes
    Route::get("stamp", [Stamps::class, 'stamp_periods']);
    Route::get("stamp/dynasty/{periodId}", [Stamps::class, 'stamp_types']);
    Route::get("stamp/detail/{stampDetail}", [Stamps::class, 'stamp_detail']);



    // Static Pages & other pages routes
    Route::get('content/about-us/', [StaticPages::class, 'about_us']);
    Route::get('content/disclaimer/', [StaticPages::class, 'disclaimer']);
    Route::get('content/privacy/', [StaticPages::class, 'privacy_policy']);
    Route::get('content/term/', [StaticPages::class, 'terms_of_use']);
    Route::get('content/return/', [StaticPages::class, 'return_policy']);
    Route::get('content/career/', [StaticPages::class, 'career']);
    Route::get('content/sitemap/', [StaticPages::class, 'sitemap']);
    Route::get('content/photopro/', [StaticPages::class, 'photopro']);
    Route::get('videos/', [StaticPages::class, 'videos']);
    Route::get('videos/detail/{videoSlug}', [StaticPages::class, 'videos_detail']);
    Route::get('content/courtesy/', [StaticPages::class, 'courtesy']);
    Route::get('contact/', [StaticPages::class, 'contact_us']);
    Route::get('application/login', [StaticPages::class, 'login']);
    Route::get('member/forgotpassword/', [StaticPages::class, 'forgotpassword']);

    Route::get('member', [StaticPages::class, 'member']);

    Route::group(['middleware' => ['check_member_auth']], function () {
        Route::get('member/upgrademembership', [StaticPages::class, 'upgrademembership']);
        Route::get('member/dashboard/', [StaticPages::class, 'dashboard']);
        Route::get('member/change-password/', [StaticPages::class, 'change_password']);
        Route::get('member/myorders/', [StaticPages::class, 'myorders']);
        Route::get('member/membership-detail', [StaticPages::class, 'membership_detail']);
        Route::get('member/manage-address', [StaticPages::class, 'manage_address']);
    });

    Route::get('media/detail/{slug}', [StaticPages::class, 'media_detail']);
    Route::get('media-coverage/', [StaticPages::class, 'media_coverage']);

    Route::get("password-reset-code-verify", [StaticPages::class, 'pwd_reset_code_verify']);

    Route::get('knowledge-base/', [StaticPages::class, 'knowledge_base']);
    Route::get('knowledge-base/know-your-coins/', [StaticPages::class, 'know_your_coins']);
    Route::get('knowledge-base/governors-of-reserve-bank-of-india/', [StaticPages::class, 'governors_india']);
    Route::get('knowledge-base/signatory-of-finance-secretary/', [StaticPages::class, 'signatory_finance_secretary']);
    Route::get('note/data/{id}', [StaticPages::class, 'knowledge_base_note_listing']);
    Route::get('knowledge-base/note-numbering-system/', [StaticPages::class, 'note_numbering_system']);
    Route::get('knowledge-base/security-features-on-current-banknotes/', [StaticPages::class, 'security_features_on_current_banknotes']);
    Route::get('knowledge-base/security-features-on-demonetized-banknotes/', [StaticPages::class, 'security_features_on_demonetized_banknotes']);
    Route::get('knowledge-base/know-your-stamps', [StaticPages::class, 'know_your_stamps']);



    // Auth routes
    Route::get("logout", [Authentication::class, 'logout']);

    // Info comments


    // Admin Section
    Route::get("admin-login", [PageLoader::class, 'admin_login']);


    // Universal search
});


Route::post("set-new-password", [Authentication::class, 'set_new_password']);

Route::post("update-member-address", [CartActions::class, 'update_member_address']);
Route::post("update-additional-address", [CartActions::class, 'update_additional_address']);

Route::get('event/', [StaticPages::class, 'event']);

Route::post("delete-address-exe", [CartActions::class, 'delete_address']);

Route::post('create-new-period', [Periods::class, 'create']);

Route::post("update-order-status", [Orders::class, 'update_order_status']);

Route::get("payment-successful", [StaticPages::class, 'payment_successful']);
Route::post('create-new-address-for-member', [CartActions::class, 'create_new_address']);



Route::group(['middleware' => ['check_admin_auth']], function () {
    // admin routes

    
    Route::group(['middleware'=>['check_shopping_auth']],function(){

        Route::get('get-all-products', [Products::class, 'get_all']);

        Route::post("create-product-exe", [Products::class, 'create']);

        Route::post("delete-product-exe", [Products::class, 'delete']);

        Route::post("delete-product-image-exe", [Products::class, 'delete_product_image']);


        Route::post("update-product-exe", [Products::class, 'update']);

        Route::post("delete-product-exe", [Products::class, 'delete']);

        Route::post('update-period-exe', [Periods::class, 'update']);

        Route::get("admin/dashboard", [PageLoader::class, 'dashboard']);

        Route::get("admin/manage-orders", [PageLoader::class, 'manage_orders']);
        Route::get("admin/view-order/{orderid}", [PageLoader::class, 'view_order']);

        Route::post("update-payment-status", [Orders::class, 'update_payment_status']);

        Route::get("admin/manage-products", [PageLoader::class, 'manage_products']);
        Route::get("admin/edit-product/{id}", [PageLoader::class, 'edit_product']);
        Route::get("admin/add-product", [PageLoader::class, 'add_product']);

            
        Route::get("admin/manage-product-categories", [PageLoader::class, 'manage_categories']);

        // Route::post("delete-shopping-category", [ShoppingCategories::class, 'delete']);

        Route::get("admin/add-category", [PageLoader::class, 'add_category']);

        Route::post("create-shopping-category-exe", [ShoppingCategories::class, 'create']);

        Route::get("admin/edit-category/{catId}", [PageLoader::class, 'edit_category']);

        Route::post('update-category-exe', [ShoppingCategories::class, 'update']);


    });

    Route::group(['middleware'=>['check_shopping_auth']],function(){

        Route::get("admin/manage-period", [PageLoader::class, 'manage_period']);
        Route::get("admin/manage-dynasty", [PageLoader::class, 'manage_dynasty']);
        Route::get("admin/manage-ruler", [PageLoader::class, 'manage_ruler']);
    
        Route::get("admin/manage-stamps", [PageLoader::class, 'manage_stamps']);
        Route::get("admin/add-stamp", [PageLoader::class, 'add_stamp']);
        Route::get("admin/edit-stamp/{id}", [PageLoader::class, 'edit_stamp']);
    
    
        Route::post("update-stamp-exe", [Stamps::class, 'update']);
    
        Route::get("admin/manage-coins", [PageLoader::class, 'manage_coins']);
        Route::get("admin/add-coin", [PageLoader::class, 'add_coin']);
        Route::get("admin/edit-coin/{id}", [PageLoader::class, 'edit_coin']);
    
        Route::get("admin/manage-notes", [PageLoader::class, 'manage_notes']);
    
        Route::get("admin/add-note", [PageLoader::class, 'add_note']);
        Route::get("admin/edit-note/{id}", [PageLoader::class, 'edit_note']);
        Route::post("update-note-exe", [Notes::class, 'update']);
    
        Route::post("get-countries", [Countries::class, 'get_countries']);

        Route::post("create-new-coin", [Coins::class, 'create_new']);

        Route::get("get-all-coins", [Coins::class, 'get_all_data']);
        Route::get("get-all-notes", [Notes::class, 'get_all_data']);
        Route::get("get-all-stamps", [Stamps::class, 'get_all_data']);

        Route::post("create-stamp-exe", [Stamps::class, 'create_new']);

        Route::post("set-coin-status-exe", [Coins::class, 'set_coin_status']);

        Route::post("update-coin-exe", [Coins::class, 'update']);

        Route::post("delete-coin-exe", [Coins::class, 'delete_coin']);


        Route::post("create-note-exe", [Notes::class, 'create']);

        Route::get("get-all-orders", [Orders::class, 'get_all']);

        Route::get("get-all-coins", [Coins::class, 'get_all']);



    });
    
    // Route::get("admin/manage-bulk-upload", [PageLoader::class, 'manage_bulk_upload']);
    // Route::get("admin/manage-bulk-images-upload", [PageLoader::class, 'manage_bulk_images_upload']);

    // Route::get("countries-for-category-id", [Countries::class, 'get_countries_dropdown_html']);

    // Route::post("bulk-upload-data-exe", [BulkUploadController::class, 'bulk_upload_data']);

    Route::group(['middleware'=>['check_shopping_auth']],function(){

        Route::get("admin/manage-history", [PageLoader::class, 'manage_history']);
        Route::get("admin/manage-enquiry", [PageLoader::class, 'manage_enquiry']);
    
        Route::get("admin/manage-banners", [PageLoader::class, 'manage_banners']);
        Route::get("admin/manage-video", [PageLoader::class, 'manage_video']);
        Route::get("admin/manage-story-week", [PageLoader::class, 'manage_story_week']);
        Route::get("admin/manage-media-coverage", [PageLoader::class, 'manage_media_coverage']);
        Route::get("admin/add-media-coverage", [PageLoader::class, 'add_media_coverage']);
        Route::get("admin/edit-media-coverage/{id}", [PageLoader::class, 'edit_media_coverage']);
        Route::get("admin/manage-events", [PageLoader::class, 'manage_events']);
        Route::get("admin/manage-news", [PageLoader::class, 'manage_news']);
        Route::get("admin/manage-career", [PageLoader::class, 'manage_career']);
        Route::post("delete-media-pdf-exe", [MediaCoverages::class, 'delete_media_pdf']);
        Route::post("update-media-coverage-exe", [MediaCoverages::class, 'update']);
    
        Route::get("admin/manage-feedback", [PageLoader::class, 'manage_feedback']);
        Route::get("admin/manage-review", [PageLoader::class, 'manage_review']);
    
        Route::get("admin/manage-members", [PageLoader::class, 'manage_members']);
        Route::get("admin/manage-watermark", [PageLoader::class, 'manage_watermark']);
    
        Route::get("admin/manage-auction", [PageLoader::class, 'manage_auction']);
        Route::get("admin/manage-key-events", [PageLoader::class, 'manage_key_events']);
        Route::get("admin/manage-coupon", [PageLoader::class, 'manage_coupon']);
    
    
        Route::get("admin/manage-product-category", [PageLoader::class, 'manage_product_category']);
        Route::get("admin/manage-seo", [PageLoader::class, 'manage_seo']);
    
        Route::post("toggle-feedback-status", [FeedbackController::class, 'toggle_status']);
    
        Route::post("toggle-review-status", [ProductRatings::class, 'toggle_status']);
    
    
    
        Route::post("set-banner-status", [Banners::class, 'set_status']);
    
        Route::post("create-new-banner", [Banners::class, 'create_new']);
    
        Route::post('update-banner-exe', [Banners::class, 'update']);
    
        Route::get("get-all-news", [News::class, 'get_all']);
    
        Route::post("update-news", [News::class, 'update']);
        Route::post("add-news-item-exe", [News::class, 'create']);
    
        Route::post("create-new-event-exe", [Events::class, 'create']);
        Route::post("update-event-exe", [Events::class, 'update']);
    
        Route::post("create-media-coverage-exe", [MediaCoverages::class, 'create']);

    });


});

Route::post("create-product-instock-notification-request", [Products::class, 'create_notification_request_in_stock']);

Route::get("email/order-placed", [EmailTests::class, 'order_placed']);


Route::post("fetch-dg-dynasties", [Coins::class, 'fetch_dg_dynasties']);

Route::post("add-product-rating", [Shopping::class, 'add_product_rating']);

Route::get("universal-search-exe", [Utils::class, 'universal_search']);


Route::post("member-login-exe", [Authentication::class, 'member_login']);

Route::post("delete-banner-exe", [Banners::class, 'delete']);

Route::get("fetch-current-cart-count", [CartActions::class, 'fetch_current_cart_count']);

Route::get("coin/list/{rulerId}", [Coins::class, 'coin_list']);
Route::get("note/list/{dynastyId}/{denominationUnit}", [Notes::class, 'note_list']);
Route::get("stamp/list/{dynastyId}", [Stamps::class, 'stamp_list']);

Route::post("admin-login-exe", [Authentication::class, 'admin_login']);



Route::post("create-info-comment", [InfoComments::class, 'create_exe']);

// Cart items
Route::post('atc-exe', [CartActions::class, 'add_to_cart_exe']);
Route::post("increase-cart-item-quantity", [CartActions::class, 'increase_cart_item']);
Route::post("decrease-cart-item-quantity", [CartActions::class, 'decrease_cart_item']);
Route::post("delete-cart-item", [CartActions::class, 'delete_cart_item']);
Route::post("recalculate-subtotal", [CartActions::class, 'recalculate_subtotal']);

Route::post("apply-coupon-exe", [Coupons::class, 'apply_exe']);

Route::get('upgrade-membership', [StaticPages::class, 'upgrademembership']);
Route::post("upgrade-membership-to-premium", [Members::class, 'upgrade_to_premium']);

Route::get("history-download/{historyId}", [Histories::class, 'download_exe']);
Route::get('shop/list/{categorySlug}', [Shopping::class, 'shop_list']);


Route::post("apply-coupon-recalculate-discount-exe", [Coupons::class, 'apply_coupon_recalculate']);
Route::post("create-order-exe", [Orders::class, 'create_exe']);

Route::post("update-order-exe", [Orders::class, 'update_order_status']);

Route::post("place-order-exe", [Orders::class, 'place_order']);

Route::get('media/', [StaticPages::class, 'media_list']);

Route::get('detailed-search', [Utils::class, 'detailed_search']);

Route::post("registration-exe", [Authentication::class, 'registration']);

Route::post("verify-email-exe", [Authentication::class, 'verify_email']);

Route::get("verify-email-page", [StaticPages::class, 'verify_email_page']);

Route::post("check-note-availability", [Shopping::class, 'check_note_availability']);
Route::get('story/', [StaticPages::class, 'story']);
Route::get('story/detail/{id}', [StaticPages::class, 'story_detail']);
Route::post('forgot-password-exe', [Authentication::class, 'forgot_password']);
Route::post('forgot-password-email-verif-exe', [Authentication::class, 'forgot_password_code_verify_set_password']);
