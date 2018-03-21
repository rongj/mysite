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
})->where('path', '[^\/admin].*');


Route::get('/admin/{path?}', function (){
	return view('admin');
})->where('path', '[\/\w\.-]*');

/* api */
// Route::group(['prefix' => 'api', 'name' => 'admin.'], function() {
// 	Route::post('/register', 'RegisterController@register');
// 	Route::post('/login', 'LoginController@login');
// 	Route::get('/checkLogined', 'LoginController@checkLogined');
// 	Route::get('/logout', 'LoginController@logout');
		
// 	Route::any('/file/upload', 'CategoryController@upload')->name('file.upload');

// 	// Route::group(['middleware' => 'auth:admin'], function(){
// 		Route::prefix('category')->group(
// 			function($router) {
// 				$router->get('/all', 'CategoryController@index')->name('category.index');
// 				$router->any('/add', 'CategoryController@add')->name('category.add');
// 				$router->any('/update', 'CategoryController@update')->name('category.update');
// 				$router->post('/delete/{id}', 'CategoryController@add')->name('category.add');
// 			}
// 		);

// 		Route::prefix('post')->group(
// 			function($router) {
// 				Route::get('/list', 'PostController@index');
// 				Route::get('/create', 'PostController@create');
// 				Route::post('/create', 'PostController@store');
// 				Route::get('/{post}', 'PostController@detail');
// 				Route::get('/create', 'PostController@create');
// 				Route::get('/{post}/edit', 'PostController@edit');
// 				Route::put('/{post}', 'PostController@update');
// 				Route::get('/{post}/delete', 'PostController@delete');
// 			}
// 		);
// 	// });
// });