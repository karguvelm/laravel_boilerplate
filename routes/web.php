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

Route::get('/', function () {
    //return view('welcome');
    return redirect()->route('webadmin.login');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'webadmin'], function () {

    Route::name('webadmin.')->group(function () {

        Auth::routes();
        Route::middleware('auth')->group(function () {
            Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');
            Route::get('dashboard', 'DashboardController@index')->name('dashboard');

            // Resources
            Route::resource('users','UserController');
        });
    });
});

