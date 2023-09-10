<?php

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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
 });