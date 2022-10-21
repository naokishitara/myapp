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
Route::group(['prefix' => 'admin'], function() {
Route::get('myapp/home', 'App\Http\Controllers\Admin\MyappController@home');
Route::get('myapp/eventdetail', 'App\Http\Controllers\Admin\MyappController@add');
Route::post('myapp/eventdetail', 'App\Http\Controllers\Admin\MyappController@eventdetail');
//Route::get('myapp/index', 'App\Http\Controllers\Admin\MyappController@index');
Route::get('myapp/edit', 'App\Http\Controllers\Admin\MyappController@edit'); 
Route::post('myapp/edit', 'App\Http\Controllers\Admin\MyappController@update');
Route::get('myapp/home', 'App\Http\Controllers\Admin\MyappController@get_day'); 
Route::get('myapp/home', 'App\Http\Controllers\Admin\MyappController@create_calendar');
Route::get('myapp/record_menu', 'App\Http\Controllers\Admin\MyappController@record_menu_index');//->name('news.add') これの意味を聞く
Route::post('myapp/record_menu', 'App\Http\Controllers\Admin\MyappController@record_menu');
Route::get('myapp/event_name', 'App\Http\Controllers\Admin\MyappController@add_event_name');
Route::post('myapp/event_name', 'App\Http\Controllers\Admin\MyappController@event_name');
Route::post('myapp/event_name', 'App\Http\Controllers\Admin\MyappController@post_event_name');
//->name('news.create');
//Route::post('myapp/event_name', 'App\Http\Controllers\Admin\MyappController@send_posts');
});

