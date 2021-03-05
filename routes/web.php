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
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'cachedCategoryHiyerarchy' ]], function() {

	Auth::routes(['register' => false]);
	//Route::get('/login/as_site_user/','Auth\LoginController@LoginWithKey')->name('auth.login_key');

	Route::group(['middleware'=> [
	'auth',
	//'currentCompany',
	//'headerDebt',
	//'ticketSeidebar'
	]],function() {
		Route::get('/dtlocalization','App\Http\Controllers\DashboardController@dtlocalization')->name('dtlocalization');
		Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('home');

		//products
		Route::get('/products/datatable','\App\Http\Controllers\Product\ProductController@datatableIndex')->name('products.datatable');
		Route::get('/products','App\Http\Controllers\Product\ProductController@index')->name('products.all');
		Route::post('/product','App\Http\Controllers\Product\ProductController@store')->name('product.store');
		Route::get('/product/create','App\Http\Controllers\Product\ProductController@create')->name('product.create');
		Route::get('/product/{id}','App\Http\Controllers\Product\ProductController@show')->name('product.show');
		Route::put('/product/{id}','App\Http\Controllers\Product\ProductController@update')->name('product.update');
		Route::delete('/product/{id}','App\Http\Controllers\Product\ProductController@destroy')->name('product.delete');
		Route::get('/product/{id}/edit','App\Http\Controllers\Product\ProductController@edit')->name('product.edit');

		//orders
		Route::get('/orders/datatable','\App\Http\Controllers\Order\OrderController@datatableIndex')->name('orders.datatable');
		Route::get('/orders','App\Http\Controllers\Order\OrderController@index')->name('orders.all');
		Route::post('/order','App\Http\Controllers\Order\OrderController@store')->name('order.store');
		Route::get('/order/create','App\Http\Controllers\Order\OrderController@create')->name('order.create');
		Route::get('/order/{id}','App\Http\Controllers\Order\OrderController@show')->name('order.show');
		Route::put('/order/{id}','App\Http\Controllers\Order\OrderController@update')->name('order.update');
		Route::delete('/order/{id}','App\Http\Controllers\Order\OrderController@destroy')->name('order.delete');
		Route::get('/order/{id}/edit','App\Http\Controllers\Order\OrderController@edit')->name('order.edit');

		//storage
		Route::get('/storages/datatable','\App\Http\Controllers\Storage\StorageController@datatableIndex')->name('storages.datatable');
		Route::get('/storages','App\Http\Controllers\Storage\StorageController@index')->name('storages.all');
		Route::post('/storage','App\Http\Controllers\Storage\StorageController@store')->name('storage.store');
		Route::get('/storage/create','App\Http\Controllers\Storage\StorageController@create')->name('storage.create');
		Route::get('/storage/{id}','App\Http\Controllers\Storage\StorageController@show')->name('storage.show');
		Route::put('/storage/{id}','App\Http\Controllers\Storage\StorageController@update')->name('storage.update');
		Route::delete('/storage/{id}','App\Http\Controllers\Storage\StorageController@destroy')->name('storage.delete');
		Route::get('/storage/{id}/edit','App\Http\Controllers\Storage\StorageController@edit')->name('storage.edit');

		//company
		Route::get('/companies/datatable','\App\Http\Controllers\Company\CompanyController@datatableIndex')->name('companies.datatable');
		Route::get('/companies','App\Http\Controllers\Company\CompanyController@index')->name('companies.all');
		Route::post('/company','App\Http\Controllers\Company\CompanyController@store')->name('company.store');
		Route::get('/company/create','App\Http\Controllers\Company\CompanyController@create')->name('company.create');
		Route::get('/company/{id}','App\Http\Controllers\Company\CompanyController@show')->name('company.show');
		Route::put('/company/{id}','App\Http\Controllers\Company\CompanyController@update')->name('company.update');
		Route::delete('/company/{id}','App\Http\Controllers\Company\CompanyController@destroy')->name('company.delete');
		Route::get('/company/{id}/edit','App\Http\Controllers\Company\CompanyController@edit')->name('company.edit');

		//user
		Route::get('/profile','\App\Http\Controllers\User\UserController@profile')->name('user.profile');
		Route::get('/profile/settings','\App\Http\Controllers\User\UserController@settings')->name('user.settings');
		Route::get('/profile/log','\App\Http\Controllers\User\UserController@log')->name('user.log');

		// Route::get('/orders/datatable','\App\Http\Controllers\Order\OrderController@datatableIndex')->name('orders.datatable');
		// Route::get('/orders','\App\Http\Controllers\Order\OrderController@index')->name('orders');
		// Route::get('/order/{id}','\App\Http\Controllers\Order\OrderController@show')->name('order.show');

		// Route::get('/profile','\App\Http\Controllers\User\UserController@profile')->name('user.profile');
		// Route::get('/profile/settings','\App\Http\Controllers\User\UserController@settings')->name('user.settings');
		// Route::get('/profile/log','\App\Http\Controllers\User\UserController@log')->name('user.log');
		
		// Route::get('/storages', 'App\Http\Controllers\Storage\StorageController@index')->name('storages');
		// Route::get('/storage/id', 'App\Http\Controllers\Storage\StorageController@show')->name('storage.show');

		// Route::get('/companies', 'App\Http\Controllers\Company\CompanyController@index')->name('companies');
		// Route::get('/company/{id}', 'App\Http\Controllers\Company\CompanyController@show')->name('company.show');

		// Route::get('/test', 'App\Http\Controllers\Product\ProductController@test')->name('test');
		// Route::get('/test-ajax', 'App\Http\Controllers\Product\ProductController@test_ajax')->name('test_ajax');
		// Route::get('/test-ajax2', 'App\Http\Controllers\Product\ProductController@test_ajax')->name('test_ajax');

	});
});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');