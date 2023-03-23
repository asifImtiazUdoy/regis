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

//Clear Config cache:
// Route::get('/config-cache', function() {
//     $exitCode = Artisan::call('config:cache');
//     return '<h1>Clear Config cleared</h1>';
// });


Auth::routes(['reset' => false]);

Route::get('/', 'HomeController@index')->name('home');

Route::post('registration', 'HomeController@store')->name('registration');

Route::get('registrants/{id}', 'HomeController@show')->name('registrant.show');

Route::get('pdf/{id}', 'HomeController@pdf')->name('download.pdf');

Route::post('search', 'SearchController@search')->name('search');

Route::prefix('admin')->group(function () {

	Route::get('/', 'Admin\HomeController@index')->name('admin.dashboard');

	Route::resource('category', 'Admin\CategoryController');

	Route::resource('school', 'Admin\SchoolController');

	Route::resource('participants', 'Admin\ExhibitorController');

	Route::get('setting', 'Admin\SettingController@index')->name('setting');

	Route::put('password/{id}', 'Admin\SettingController@updatePassword')->name('password');

	Route::put('update-info/{id}', 'Admin\SettingController@info')->name('update.info');

	Route::put('update-banner/{id}', 'Admin\SettingController@banner')->name('update.banner');

	Route::put('update-pdf/{id}', 'Admin\SettingController@pdfHead')->name('update.pdf');

});