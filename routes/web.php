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

Auth::routes();

Route::group(['middleware' => 'guest'], function () {
	Route::get('/login', 'Auth\LoginController@showLoginForm');
	Route::post('/login', 'Auth\LoginController@login');
});

Route::group(['middleware' => 'authenticate'], function () {
	Route::get('/logout', 'Auth\LoginController@logout');

	Route::get('/', 'CashierController@show');
	Route::post('/cashier', 'CashierController@submitTransaction');
	Route::get('/cashier/menu-products', 'CashierController@getMenuProducts');
	Route::get('/cashier/menu-submenus', 'CashierController@getMenuSubmenus');
	Route::post('/cashier/void', 'CashierController@voidSale');

	Route::group(['middleware' => 'admin'], function() {
		// ADMIN
		Route::group(['prefix' => 'staff', 'as' => 'staff::'], function () {
		    Route::get('/', 'StaffController@show');
		    Route::get('/add', 'StaffController@add');
		    Route::post('/add', 'StaffController@create');
		    Route::get('/{id}', 'StaffController@edit');
		    Route::post('/{id}', 'StaffController@update');
		    Route::post('/{id}/changepassword', 'StaffController@changePassword');
		});

		Route::group(['prefix' => 'categories', 'as' => 'categories::'], function () {
		    Route::get('/', 'CategoriesController@show');
		    Route::get('/add', 'CategoriesController@add');
		    Route::post('/add', 'CategoriesController@create');
		    Route::get('/{id}', 'CategoriesController@edit');
		    Route::post('/{id}', 'CategoriesController@update');
		});

		Route::group(['prefix' => 'details', 'as' => 'details::'], function () {
		    Route::get('/', 'ProductDetailsController@show');
		    Route::get('/add', 'ProductDetailsController@add');
		    Route::post('/add', 'ProductDetailsController@create');
		    Route::get('/{id}', 'ProductDetailsController@edit');
		    Route::post('/{id}', 'ProductDetailsController@update');
		});

		Route::group(['prefix' => 'ingredients', 'as' => 'ingredients::'], function () {
		    Route::get('/', 'IngredientsController@show');
		    Route::get('/add', 'IngredientsController@add');
		    Route::post('/add', 'IngredientsController@create');
		    Route::get('/{id}', 'IngredientsController@edit');
		    Route::post('/{id}', 'IngredientsController@update');
		});

		Route::group(['prefix' => 'discounts', 'as' => 'discounts::'], function () {
		    Route::get('/', 'DiscountsController@show');
		    Route::get('/add', 'DiscountsController@add');
		    Route::post('/add', 'DiscountsController@create');
		    Route::get('/{id}', 'DiscountsController@edit');
		    Route::post('/{id}', 'DiscountsController@update');
		});

		Route::group(['prefix' => 'quantitytypes', 'as' => 'quantitytypes::'], function () {
		    Route::get('/', 'QuantityTypeController@show');
		    Route::get('/add', 'QuantityTypeController@add');
		    Route::post('/add', 'QuantityTypeController@create');
		    Route::get('/{id}', 'QuantityTypeController@edit');
		    Route::post('/{id}', 'QuantityTypeController@update');
		});

		Route::group(['prefix' => 'sales', 'as' => 'sales::'], function () {
		    Route::get('/', 'SalesController@show');
		    Route::get('/day', 'SalesController@showDay');
		    Route::get('/week', 'SalesController@showWeek');
		    Route::get('/month', 'SalesController@showMonth');
		});

		Route::group(['prefix' => 'items', 'as' => 'items::'], function () {
		    Route::get('/', 'ItemsController@show');
		    Route::get('/day', 'ItemsController@showDay');
		    Route::get('/week', 'ItemsController@showWeek');
		    Route::get('/month', 'ItemsController@showMonth');
		});

		Route::post('/delete', 'DeleteController@delete');
		Route::post('/replenish', 'IngredientsController@replenish');
	});
});