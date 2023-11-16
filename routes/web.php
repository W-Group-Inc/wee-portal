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
Route::group( ['middleware' => 'auth'], function()
{
    Route::get('/', 'PortalController@index');
    Route::get('/applications', 'PortalController@show');
    Route::post('new-portal','PortalController@new_portal');
    Route::get('deactivate-portal/{id}','PortalController@deactivate_portal');
    Route::get('activate-portal/{id}','PortalController@activate_portal');
    Route::get('/home', 'PortalController@index')->name('home');


    Route::get('documents','DocumentController@index');

    Route::get('bulletins','BulletinController@index');
    Route::post('new-bulletin','BulletinController@store');
});

