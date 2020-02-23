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


// Route::get('/helper.js', function () {
//     return view('helper');
// })->middleware(['auth.shop']);

Route::get('/helper.js','AnnouncementController@helper')->middleware(['auth.shop'])->name('helper');

// Route::get('/', function () {
//     return view('welcome');
// })->middleware(['auth.shop'])->name('home');

// Route::get('/','AnnouncementController@index')->middleware(['auth.shop'])->name('home');
Route::get('/','AnnouncementController@index')->middleware(['auth.shop'])->name('home');

// Route::get('/create','AnnouncementController@index');


Route::post('/','AnnouncementController@store')->middleware(['auth.shop'])->name('store');

Route::put('/','AnnouncementController@update')->middleware(['auth.shop'])->name('update');

Route::delete('/','AnnouncementController@delete')->middleware(['auth.shop'])->name('delete');

Route::post('/announcements','AnnouncementController@store')->middleware(['auth.shop']);

Route::get('/api','AnnouncementController@get')->middleware(['auth.shop']);