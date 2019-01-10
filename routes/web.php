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

use Illuminate\Support\Facades\Cookie;

Route::get('/', 'AdController@index')->name('index');

Auth::routes();
Route::Resource('group', 'GroupController')->except('show')->middleware('auth');
///////////////////
Route::get('Subgroup/{id}', 'SubgroupController@index')->middleware('auth')->name('subgroup.index');
Route::post('Subgroup/{id}', 'SubgroupController@store')->middleware('auth')->name('subgroup.store');
Route::delete('Subgroup/{id}', 'SubgroupController@destroy')->middleware('auth')->name('subgroup.destroy');
/////////////////////////////////////
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/users', 'HomeController@users')->name('home.users');
Route::get('/ads/home', 'AdController@userindex')->name('user.index')->middleware('auth');
Route::patch('/home/{id}', 'HomeController@toggle')->name('home.update');
Route::delete('/home/{id}', 'HomeController@destroy')->name('home.destroy');
/////////////////////////////////////////////////////
Route::get('/user', 'UserController@index')->name('user');
///////////////////////////////////
Route::Resource('ads', 'AdController')->except(['create', 'show'])->middleware('auth');
Route::get('create/{id}', 'AdController@create')->name('ads.create')->middleware('auth');
Route::get('ads/show/{id}', 'AdController@show')->name('ads.show');

///////////////////////////////////////////////////////////
Route::get('city', 'CityController@index')->name('city.index');
Route::get('city/{city}', 'CityController@store')->name('city.store');
/////////////////////////////////////////////////
Route::get('group/show', 'GroupController@show')->name('group.show');