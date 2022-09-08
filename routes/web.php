<?php

use App\Http\Controllers\EventController;
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

// not needed route as of the moment
// Route::get('/', function () {
//     return redirect()->route('events.index');
// });

// TODO: How could we make this more readable?
// Answer: by grouping them you can minimize the script that needed to be input
// TODO: How would you implement auth for these routes?
// Answer: by adding a middleware auth to the route script was like this
// Route::group(['middleware' => 'auth'], function() { });
// all inside the group will be bind in middleware of auth
// if uses more middlewares it can be parse in an array like example 'middleware' => ['auth', 'session']

Route::controller(EventController::class)->group(function () {
    Route::group(['prefix' => 'events', 'as' => 'events.'], function () {
        // the  "/" route implies the prefix name of the group
        // the "as" refer to the first input to route name of the group
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('create', 'create')->name('create');

        Route::group(['prefix' => '{event}'], function () {
            Route::get('edit', 'edit')->name('edit');
            Route::get('/', 'show')->name('show');
            Route::put('/', 'update')->name('update');
            Route::delete('/', 'destroy')->name('destroy');
        });
    });
});
