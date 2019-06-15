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

Route::middleware(['auth'])->group(function () {
    //get
    Route::get('/', 'PackageController@index')->name('home');
    Route::get('/package/{id}', 'PackageController@show')->name('show-package');
    //create
    Route::get('/package-create', 'PackageController@create')->name('create-package');
    Route::post('/package-save', 'PackageController@store')->name('save-package');
    //edit
    Route::get('/package-edit/{id}', 'PackageController@edit')->name('edit-package');
    Route::put('/package-update/{id}', 'PackageController@update')->name('update-package');
    //delete
    Route::get('/package-delete/{id}', 'PackageController@destroy')->name('delete-package');
    //filter
    Route::get('/package-filter', 'PackageController@filter')->name('filter-packages');
});

Route::prefix('admin')->middleware(['admin'])->group(function () {
    //get
    Route::get('/', 'AdminController@index')->name('admin-home');
    Route::get('/packages', 'AdminController@getPackages')->name('admin-packages');
    Route::get('/users', 'AdminController@getUsers')->name('admin-users');
    Route::get('/user-packages/{id}', 'AdminController@getUserPackages')->name('admin-user-packages');
    Route::get('/package/{id}', 'AdminController@show')->name('admin-show-package');
    //create
    Route::get('/package-users', 'AdminController@selectUser')->name('admin-select-package-user');
    Route::get('/package-create/{id}', 'AdminController@create')->name('admin-create-package');
    Route::post('/package-save', 'AdminController@store')->name('admin-save-package');
    //edit
    Route::get('/package-edit/{id}', 'AdminController@edit')->name('admin-edit-package');
    Route::put('/package-update/{id}', 'AdminController@update')->name('admin-update-package');
    //delete
    Route::get('/package-delete/{id}', 'AdminController@destroy')->name('admin-delete-package');
    //filter
    Route::get('/package-filter', 'AdminController@filter')->name('admin-filter-packages');
});