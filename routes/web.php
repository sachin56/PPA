<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',\App\Http\Livewire\HomeComponent::class);
Route::get('/shop',\App\Http\Livewire\ShopComponent::class);
Route::get('/cart',\App\Http\Livewire\CartComponent::class);
Route::get('/checkout',\App\Http\Livewire\CheckoutComponent::class);

Route::get('/product/{slug}',\App\Http\Livewire\DetailComponent::class)->name('product.details');

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
Route::get('/user/dashboard',\App\Http\Livewire\User\UserdashboardComponent::class)->name('user.dashboard');
});
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard',\App\Http\Livewire\User\UserdashboardComponent::class)->name('admin.dashboard');
});


