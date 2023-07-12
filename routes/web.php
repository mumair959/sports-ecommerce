<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;

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
Route::get('lang/{lang}', [App\Http\Controllers\LanguageController::class, 'switchLang'])->name('lang.switch');

// ***************Localization for Vue Start****************
Route::get('/js/lang.js', function () {
    Cache::flush();
    $strings = Cache::rememberForever('lang.js', function () {
        $lang = config('app.locale');
        $files   = glob(base_path('lang/' . $lang . '/*.php'));
        $strings = [];

        foreach ($files as $file) {
            $name           = basename($file, '.php');
            $strings[$name] = require $file;
        }

        return $strings;
    });

    header('Content-Type: text/javascript');
    echo('window.i18n = ' . json_encode($strings) . ';');
    exit();
})->name('assets.lang');
// ***************Localization for Vue End****************

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/faq', [App\Http\Controllers\StaticPagesController::class, 'faq'])->name('faq');
Route::get('/about', [App\Http\Controllers\StaticPagesController::class, 'about'])->name('about');
Route::get('/privacy_policy', [App\Http\Controllers\StaticPagesController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms_and_conditions', [App\Http\Controllers\StaticPagesController::class, 'termsAndConditions'])->name('terms-and-conditions');

Route::get('/contact_us', [App\Http\Controllers\ContactUsController::class, 'index'])->name('contact-us');

Route::get('/product_details', [App\Http\Controllers\ProductController::class, 'details'])->name('product-details');

Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/blog_details', [App\Http\Controllers\BlogController::class, 'details'])->name('blog-details');

Route::get('/order_details', [App\Http\Controllers\OrderController::class, 'details'])->name('order-details');

Route::get('/buy', [App\Http\Controllers\BuyController::class, 'index'])->name('buy');
Route::get('/get_all_products', [App\Http\Controllers\BuyController::class, 'getAllProducts'])->name('get-all-products');
Route::get('/get_all_product_categories', [App\Http\Controllers\BuyController::class, 'getAllProductCategories'])->name('get-all-product-categories');
Route::get('/get_all_conditions', [App\Http\Controllers\BuyController::class, 'getAllCondtions'])->name('get-all-conditions');

Route::get('/add_rent_items', [App\Http\Controllers\RentController::class, 'add_items'])->name('add-rent-items');
Route::get('/find_rent_items', [App\Http\Controllers\RentController::class, 'find_items'])->name('find-rent-items');

Route::get('/add_exchange_items', [App\Http\Controllers\ExchangeController::class, 'add_items'])->name('add-exchange-items');
Route::get('/find_exchange_items', [App\Http\Controllers\ExchangeController::class, 'find_items'])->name('find-exchange-items');

Route::post('/add_subscription_email',[App\Http\Controllers\SubscriptionEmailController::class,'addSubscriptionEmail'])->name('add-subscription-email');

Route::post('/send_contact_us_email',[App\Http\Controllers\ContactUsController::class,'sendContactUsEmail'])->name('send-contact-us-email');

Auth::routes();

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::get('/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
Route::get('/get_shipping_info', [App\Http\Controllers\CartController::class, 'getShippingInfo'])->name('get-shipping-info');
Route::post('/save_shipping_info', [App\Http\Controllers\CartController::class, 'saveShippingInfo'])->name('save-shipping-info');
Route::post('/confirm_payment', [App\Http\Controllers\CartController::class, 'confirmPayment'])->name('confirm-payment');


Route::get('/sell', [App\Http\Controllers\SellController::class, 'index'])->name('sell');
Route::post('/add_new_product', [App\Http\Controllers\SellController::class, 'addNewProduct'])->name('add-new-product');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/admin_blogs_list', [App\Http\Controllers\DashboardController::class, 'blogs'])->name('admin-blogs-list');
Route::get('/admin_orders_list', [App\Http\Controllers\DashboardController::class, 'orders'])->name('admin-orders-list');
Route::get('/admin_add_blog', [App\Http\Controllers\DashboardController::class, 'addNewBlog'])->name('admin-add-blog');
Route::get('/update_product_status', [App\Http\Controllers\DashboardController::class, 'updateProductStatus'])->name('update-product-status');
Route::get('/update_blog_status', [App\Http\Controllers\DashboardController::class, 'updateBlogStatus'])->name('update-blog-status');
Route::post('/admin_save_blog', [App\Http\Controllers\DashboardController::class, 'saveNewBlog'])->name('admin-save-blog');
Route::post('/update_profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('update-profile');
