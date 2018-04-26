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

Route::get('/{path?}', function () {
    return view('index');
})->where('path', '[^\/admin|^\/api].*');


Route::get('/admin/{path?}', function (){
	return view('admin');
})->where('path', '[\/\w\.-]*');

/* api */
Route::group(['prefix' => 'api'], function() {
	Route::post('/register', 'RegisterController@register');
	Route::post('/login', 'LoginController@login');
	Route::get('/checkLogined', 'LoginController@checkLogined');
	Route::get('/logout', 'LoginController@logout');
		
	// Route::post('/file/upload', 'CategoryController@upload')->name('file.upload');

	// Route::group(['middleware' => 'auth:admin'], function(){
		Route::prefix('category')->group(
			function($router) {
				$router->get('/all', 'CategoryController@index');
				$router->any('/add', 'CategoryController@add');
				$router->any('/update', 'CategoryController@update');
				$router->post('/delete/{id}', 'CategoryController@delete');
			}
		);

		Route::prefix('plate')->group(
			function($router) {
				$router->get('/all', 'PlateController@index');
				$router->any('/add', 'PlateController@add');
				$router->any('/update', 'PlateController@update');
				$router->post('/delete/{id}', 'PlateController@delete');
			}
		);

		Route::prefix('tag')->group(
			function($router) {
				$router->get('/all', 'TagController@index');
				$router->post('/create', 'TagController@create');
				$router->post('/update/{id}', 'TagController@update');
				$router->post('/destroy/{id}', 'TagController@destroy');
			}
		);

		Route::prefix('post')->group(
			function($router) {
				Route::get('/list', 'PostController@index');
				Route::get('/create', 'PostController@create');
				Route::post('/create', 'PostController@store');
				Route::get('/{post}', 'PostController@detail');
				Route::get('/create', 'PostController@create');
				Route::get('/{post}/edit', 'PostController@edit');
				Route::put('/{post}', 'PostController@update');
				Route::get('/{post}/delete', 'PostController@delete');
			}
		);
	// });
});