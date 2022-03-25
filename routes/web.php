<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\HomepageController@index');
Route::post('/check', 'App\Http\Controllers\HomepageController@check');
Route::post('/explanation', 'App\Http\Controllers\HomepageController@explanation');
Route::get('/update_checksum', 'App\Http\Controllers\HomepageController@update_checksum');
