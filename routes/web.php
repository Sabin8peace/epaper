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

Auth::routes();

Route::get('paperimage/{href?}', function ($href=null) {
    // dd(($href));
    return view('frontend/paperimage',compact('href'));
})->name('front.paperimage');

Route::get('epapermain/{date?}/{page?}', 'HomeController@epaper')->name('front.epaper');
Route::post('epapermain/', 'HomeController@epaperdate')->name('front.epaperdate');

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'backend', 'middleware' => ['auth']], function () {

    Route::resource('epaperlink', 'EpaperLinkController');
Route::get('epaperlinkdel/{id?}', 'EpaperLinkController@deletesingle')->name('epaperlink.deletesingle');
Route::post('epaperlinkupdate', 'EpaperLinkController@updatelink')->name('epaperlink.updatelink');
Route::resource('epaper', 'EpaperController');
Route::post('epaperdate', 'EpaperController@epaperdate')->name('epaper.date');
Route::post('indexmain/', 'EpaperController@indexmain')->name('epaper.indexmain');
Route::get('managelinks/{id?}', 'EpaperController@managelinks')->name('epaper.managelinks');

});

