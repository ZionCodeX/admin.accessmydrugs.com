<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StorageFileController;

Route::get('image/{filename}', [StorageFileController::class,'getPubliclyStorgeFile'])->name('image.displayImage');
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

//HOME PAGES ROUTES
//Route::get('/', function () { return view('pages.dashboard');});
Route::get('/', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/index', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');

Auth::routes(['verify' => true]);

//MAIN PAGE CONTROLLERS
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');


//ORDER CONTROLLERS
Route::get('/order/{status}/index', [App\Http\Controllers\OrderController::class, 'order'])->name('order');


//ORDER SWITCH MESSAGE
Route::post('/order/switch/message', [App\Http\Controllers\OrderController::class, 'order_switch_message'])->name('order_switch_message');


//PRODUCT CONTROLLERS
Route::get('product/create/form/index', [App\Http\Controllers\ProductController::class, 'product_create_form_index'])->name('product_create_form_index');
Route::post('product/create/form/prox', [App\Http\Controllers\ProductController::class, 'product_create_form_prox'])->name('product_create_form_prox');
Route::get('product/update/{pid_post}/form/index', [App\Http\Controllers\ProductController::class, 'product_update_form_index'])->name('product_update_form_index');
Route::post('product/update/form/prox', [App\Http\Controllers\ProductController::class, 'product_update_form_prox'])->name('product_update_form_prox');
Route::post('product/delete/record/prox', [App\Http\Controllers\ProductController::class, 'product_delete_record_prox'])->name('product_delete_record_prox');
Route::get('product/view/table/index', [App\Http\Controllers\ProductController::class, 'product_view_table_index'])->name('product_view_table_index');
Route::get('product/view/{product_slug}/list/index', [App\Http\Controllers\ProductController::class, 'product_view_list_index'])->name('product_view_list_index');
Route::post('product/feature/record/prox', [App\Http\Controllers\ProductController::class, 'product_feature_record_prox'])->name('product_feature_record_prox');
Route::get('product/visibility/{pid_product}/{product_visibility}/prox', [App\Http\Controllers\ProductController::class, 'product_visibility_prox'])->name('product_visibility_prox');
Route::post('product/category/create/form/index', [App\Http\Controllers\ProductController::class, 'product_category_create_form_index'])->name('product_category_create_form_index');
Route::post('product/category/create/form/prox', [App\Http\Controllers\ProductController::class, 'product_category_create_form_prox'])->name('product_category_create_form_prox');
Route::get('bulkupload', [App\Http\Controllers\ProductController::class, 'bulk_product_upload'])->name('bulk_product_upload');


//POST CONTROLLERS
Route::get('post/create/form/index', [App\Http\Controllers\PostsController::class, 'post_create_form_index'])->name('post_create_form_index');
Route::post('post/create/form/prox', [App\Http\Controllers\PostsController::class, 'post_create_form_prox'])->name('post_create_form_prox');
Route::get('post/update/{pid_post}/form/index', [App\Http\Controllers\PostsController::class, 'post_update_form_index'])->name('post_update_form_index');
Route::post('post/update/form/prox', [App\Http\Controllers\PostsController::class, 'post_update_form_prox'])->name('post_update_form_prox');
Route::post('post/delete/record/prox', [App\Http\Controllers\PostsController::class, 'post_delete_record_prox'])->name('post_delete_record_prox');
Route::get('post/view/table/index', [App\Http\Controllers\PostsController::class, 'post_view_table_index'])->name('post_view_table_index');
Route::get('post/view/{post_slug}/list/index', [App\Http\Controllers\PostsController::class, 'post_view_list_index'])->name('post_view_list_index');


//REQUEST QUOTES ROUTES
Route::get('/request/quotes/create/index', [App\Http\Controllers\OrdersController::class, 'request_quotes_create_index'])->name('request_quotes_create_index');
Route::post('/request/quotes/create/prox', [App\Http\Controllers\OrdersController::class, 'request_quotes_create_prox'])->name('request_quotes_create_prox');
Route::get('/request/quotes/update/{pid_order}/index', [App\Http\Controllers\OrdersController::class, 'request_quotes_update_index'])->name('request_quotes_update_index');
Route::post('/request/quotes/update/prox', [App\Http\Controllers\OrdersController::class, 'request_quotes_update_prox'])->name('request_quotes_update_prox');
Route::post('/request/quotes/delete/{pid_order}/prox', [App\Http\Controllers\OrdersController::class, 'request_quotes_delete_prox'])->name('request_quotes_delete_prox');


//ORDERS VIEWS
Route::get('/order/{status}/view/index', [App\Http\Controllers\OrdersController::class, 'order_status_view_index'])->name('order_status_view_index');
Route::get('/order/admin/product/view/{pid_order}/index', [App\Http\Controllers\OrdersController::class, 'order_admin_product_view_index'])->name('order_admin_product_view_index');


//ORDERS ADMIN CREATE
Route::post('/order/admin/create/index', [App\Http\Controllers\OrdersController::class, 'order_admin_create_index'])->name('order_admin_create_index');
Route::post('/order/admin/create/prox', [App\Http\Controllers\OrdersController::class, 'order_admin_create_prox'])->name('order_admin_create_prox');


//SHIPPING RATE CONTROLLERS
Route::get('shipping/rate/create/form/index', [App\Http\Controllers\ShippingRatesController::class, 'shipping_rate_create_form_index'])->name('shipping_rate_create_form_index');
Route::post('shipping/rate/create/form/prox', [App\Http\Controllers\ShippingRatesController::class, 'shipping_rate_create_form_prox'])->name('shipping_rate_create_form_prox');
Route::get('shipping/rate/update/{pid_shipping_rate}/form/index', [App\Http\Controllers\ShippingRatesController::class, 'shipping_rate_update_form_index'])->name('shipping_rate_update_form_index');
Route::post('shipping/rate/update/form/prox', [App\Http\Controllers\ShippingRatesController::class, 'shipping_rate_update_form_prox'])->name('shipping_rate_update_form_prox');
Route::post('shipping/rate/delete/record/prox', [App\Http\Controllers\ShippingRatesController::class, 'shipping_rate_delete_record_prox'])->name('shipping_rate_delete_record_prox');
Route::get('shipping/rate/view/table/index', [App\Http\Controllers\ShippingRatesController::class, 'shipping_rate_view_table_index'])->name('shipping_rate_view_table_index');
Route::get('shipping/rate/view/{pid_shipping_rate}/list/index', [App\Http\Controllers\ShippingRatesController::class, 'shipping_rate_view_list_index'])->name('shipping_rate_view_list_index');


//FINANCIAL SETTINGS CONTROLLERS
Route::get('financial/settings/update/form/index', [App\Http\Controllers\FinancialSettingsController::class, 'financial_settings_update_form_index'])->name('financial_settings_update_form_index');
Route::post('financial/settings/update/form/prox', [App\Http\Controllers\FinancialSettingsController::class, 'financial_settings_update_form_prox'])->name('financial_settings_update_form_prox');
Route::get('financial/settings/view/list/index', [App\Http\Controllers\FinancialSettingsController::class, 'financial_settings_view_list_index'])->name('financial_settings_view_list_index');


//PRODUCTS ADMIN ADD
Route::post('/order/admin/add_product/index', [App\Http\Controllers\OrdersController::class, 'order_admin_add_product_index'])->name('order_admin_add_product_index');
Route::post('/order/admin/add_product/prox', [App\Http\Controllers\OrdersController::class, 'order_admin_add_product_prox'])->name('order_admin_add_product_prox');
Route::get('/order/admin/product/view/{pid_order}/index', [App\Http\Controllers\OrdersController::class, 'order_admin_product_view_index'])->name('order_admin_product_view_index');


//ADMIN ACTIONS REQUEST
Route::post('/admin/action/request_pending/prox', [App\Http\Controllers\AdminActionsController::class, 'admin_action_request_pending_prox'])->name('admin_action_request_pending_prox');
Route::post('/admin/action/request_processing/prox', [App\Http\Controllers\AdminActionsController::class, 'admin_action_request_processing_prox'])->name('admin_action_request_processing_prox');
Route::post('/admin/action/quote_generated/prox', [App\Http\Controllers\AdminActionsController::class, 'admin_action_quote_generated_prox'])->name('admin_action_quote_generated_prox');
Route::post('/admin/action/review_expired_invoice/prox', [App\Http\Controllers\AdminActionsController::class, 'admin_action_review_expired_invoice_prox'])->name('admin_action_review_expired_invoice_prox');


//ADMIN ACTIONS STAGES
Route::post('/admin/action/order_processing/prox', [App\Http\Controllers\AdminStagesController::class, 'admin_action_order_processing_prox'])->name('admin_action_order_processing_prox');
Route::post('/admin/action/order_shipped/prox', [App\Http\Controllers\AdminStagesController::class, 'admin_action_order_shipped_prox'])->name('admin_action_order_shipped_prox');
Route::post('/admin/action/order_arrived/prox', [App\Http\Controllers\AdminStagesController::class, 'admin_action_order_arrived_prox'])->name('admin_action_order_arrived_prox');
Route::post('/admin/action/order_delivered/prox', [App\Http\Controllers\AdminStagesController::class, 'admin_action_order_delivered_prox'])->name('admin_action_order_delivered_prox');
Route::post('/admin/action/order_completed/prox', [App\Http\Controllers\AdminStagesController::class, 'admin_action_order_completed_prox'])->name('admin_action_order_completed_prox');



//PROFILE 
Route::get('/profile/update/index', [App\Http\Controllers\ProfileUpdateController::class, 'profile_update_index'])->name('profile_update_index');
Route::post('/profile/update/prox', [App\Http\Controllers\ProfileUpdateController::class, 'profile_update_prox'])->name('profile_update_prox');
Route::get('/password/reset', [App\Http\Controllers\PagesController::class, 'password_reset'])->name('password_reset');

//BANK PAYMENT
Route::get('/bank/payment', [App\Http\Controllers\PagesController::class, 'bank_payment'])->name('bank_payment');
Route::get('/payment/status', [App\Http\Controllers\PagesController::class, 'payment_status'])->name('payment_status');

//MAILS 
Route::get('/mail', [App\Http\Controllers\MailController::class, 'mailsend'])->name('mail');
Route::get('/maildesign', [App\Http\Controllers\MailController::class, 'preview'])->name('maildesign');

//ADMIN PAGES
Route::get('/admin', [App\Http\Controllers\AdminPagesController::class, 'login_admin_index'])->name('login_admin_index');
Route::post('/login/admin/prox', [App\Http\Controllers\AdminLoginController::class, 'login_admin_prox'])->name('login_admin_prox');


//USERS PROFILE 
Route::get('/users/profile/view/{status}/index', [App\Http\Controllers\UsersProfileController::class, 'users_profile_view_status_index'])->name('users_profile_view_status_index');


//OTHER PAGES 
Route::get('/no/records', [App\Http\Controllers\PagesController::class, 'not_available'])->name('not_available');
Route::get('/password/reset', [App\Http\Controllers\PagesController::class, 'password_reset'])->name('password_reset');
Route::get('/logout', [App\Http\Controllers\PagesController::class, 'logout'])->name('logout');




//MIGRATION
Route::get('/xmigrate', function() {
    $exitCode = Artisan::call('migrate:refresh', ['--force' => true,]);
    dd('MIGRATION WAS SUCCESSFUL!');
});

//CLEAR-CACHE
Route::get('/xclean', function() {
    $exitCode1 = Artisan::call('cache:clear');
    $exitCode2 = Artisan::call('view:clear');
    $exitCode3 = Artisan::call('route:clear');
    $exitCode4 = Artisan::call('config:cache');
    dd('CACHE-CLEARED, VIEW-CLEARED, ROUTE-CLEARED & CONFIG-CACHED WAS SUCCESSFUL!');
    //php artisan optimize:clear //clear bootstap cache
 });
