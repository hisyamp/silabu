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
Route::get('/', function () {
    return view('welcome');
});

// login
Route::post('/postlogin','Auth\LoginController@postLogin')->name('postLogin');
Route::get('/formlogin','Auth\LoginController@formLogin')->name('login');

Route::resource('dashboard','DashboardController');
Route::resource('/user','UserController');
// drop
Route::get('drop','DropController@index');
Route::post('drop','DropController@store');
Route::get('drop/{fileTitle}','DropController@show');
Route::get('drop/{fileTitle}/download','DropController@download');
Route::get('drop/{id}/destroy','DropController@destroy');

// login
// Route::post('/postlogin','Auth\LoginController@postLogin')->name('postLogin');
// Route::get('/formlogin','Auth\LoginController@formLogin');

// post
Route::group(['middleware' => 'auth'], function(){
    
    Route::get('dwnld_announce','PostController@download_announce')->name('download.announce');
    Route::get('announce','PostController@announce');
    Route::get('mng_announce','PostController@mng_announce');
    Route::post('post_announce','PostController@post_announce')->name('post.announce');
    Route::get('post','PostController@index');
    Route::get('dashboard','PostController@dashboard');
    Route::post('post1','PostController@upload1')->name('post.upload1');
    Route::post('post2','PostController@upload2')->name('post.upload2');
    Route::post('post3','PostController@upload3')->name('post.upload3');
    Route::get('listpost','PostController@list');
    Route::get('download1/{id}','PostController@download1');
    Route::get('download2/{id}','PostController@download2');
    Route::get('download3/{id}','PostController@download3');
    Route::get('delete/{id}','PostController@delete');    
});
