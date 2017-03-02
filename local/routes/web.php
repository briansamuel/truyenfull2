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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/admin', 'AdminController@index');
Route::get('/admin/story','AdminController@storiesAction');
Route::get('/admin/chapter','AdminController@chaptersAction');
Route::post('/admin/story','StoryController@store');
<<<<<<< HEAD
Route::get('/admin/test','AdminController@test');
Route::get('/admin/plugins/autostory',function () {
    return view('admin/plugins/autostory');
});
// Ajax
Route::post('/admin/ajax/getstory','AdminController@ajaxGetstory');
=======
Route::get('/admin/test','AdminController@test');
>>>>>>> origin/master
