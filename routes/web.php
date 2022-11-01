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
Route::get('myapp/main', 'App\Http\Controllers\Admin\MyappController@home')->middleware('auth');
Route::get('myapp/eventdetail', 'App\Http\Controllers\Admin\MyappController@add')->middleware('auth');

Route::post('myapp/eventdetail', 'App\Http\Controllers\Admin\MyappController@eventdetail')->middleware('auth');
//Route::get('myapp/index', 'App\Http\Controllers\Admin\MyappController@index');
Route::get('myapp/edit', 'App\Http\Controllers\Admin\MyappController@edit')->middleware('auth');
Route::post('myapp/edit', 'App\Http\Controllers\Admin\MyappController@update')->middleware('auth');
Route::get('myapp/main', 'App\Http\Controllers\Admin\MyappController@get_day')->middleware('auth');
Route::get('myapp/main', 'App\Http\Controllers\Admin\MyappController@create_calendar')->middleware('auth');
Route::get('myapp/record_menu', 'App\Http\Controllers\Admin\MyappController@get_eventdetails')->middleware('auth');;//->name('news.add') これの意味を聞く
Route::post('myapp/record_menu', 'App\Http\Controllers\Admin\MyappController@record_menu')->middleware('auth');
Route::get('myapp/event', 'App\Http\Controllers\Admin\MyappController@add_event_name')->middleware('auth');
Route::post('myapp/event', 'App\Http\Controllers\Admin\MyappController@event_name')->middleware('auth');
Route::get('myapp/eventdetail', 'App\Http\Controllers\Admin\MyappController@get_eventdetail')->middleware('auth');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
