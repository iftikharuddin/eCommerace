<?php



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
	Route::get('users/signin', 'UsersController@getSignin');
	Route::post('users/signin', 'UsersController@postSignin');

	Route::resource('users', 'UsersController');


	Route::get('/store', 'StoreController@index');
	Route::get('store/category/{id}', 'StoreController@getCategory');
	Route::get('store/search', 'StoreController@getSearch');

	Route::get('/admin', function () {
		return view('welcome');
	});
	Route::resource('/store', 'StoreController');
	Route::resource('/', 'StoreController');
	Route::resource('admin/categories', 'CategoriesController');
	Route::resource('admin/products', 'ProductsController');
});


