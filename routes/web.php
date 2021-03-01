<?php
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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'cachedCategoryHiyerarchy' ]], function() {

	Auth::routes(['register' => false]);
	Route::get('/login/as_site_user/','Auth\LoginController@LoginWithKey')->name('auth.login_key');

	Route::group(['middleware'=> [
	'auth',
	//'currentCompany',
	//'headerDebt',
	//'ticketSeidebar'
	]],function() {

		Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('home');
		Route::get('/products','App\Http\Controllers\Product\ProductController@index')->name('products.all');
		Route::get('/product/{id}','App\Http\Controllers\Product\ProductController@show')->name('product.show');
		Route::get('/orders','\App\Http\Controllers\Order\OrderController@index')->name('orders');
		Route::get('/products/datatable','\App\Http\Controllers\Product\ProductController@datatableIndex')->name('products.datatable');
		Route::get('/profile','\App\Http\Controllers\User\UserController@profile')->name('user.profile');
		Route::get('/profile/settings','\App\Http\Controllers\User\UserController@settings')->name('user.settings');
		Route::get('/profile/log','\App\Http\Controllers\User\UserController@log')->name('user.log');
		
		Route::get('/storages', 'App\Http\Controllers\Storage\StorageController@index')->name('storages');
		Route::get('/storage/id', 'App\Http\Controllers\Storage\StorageController@show')->name('storage.show');

	});
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
