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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/listBooking', 'ListBookingController@index')->name('listbooking');

Route::get('/addBooking', 'AddBookingController@index')->name('addbooking');
Route::post('/addBooking', 'AddBookingController@send')->name('savebooking');

Route::post('/listAvailableBooking', 'ListBookingController@available')->name('periodavbooking');

Route::get('/createAssoc', 'AddAssociationController@index')->name('createassoc');
Route::post('/createAssoc', 'AddAssociationController@index')->name('saveassoc');

Route::get('/manageUser', 'ManageUserController@index')->name('manageuser');

Route::get('/manageSchedule', 'ManageScheduleController@index')->name('manageschedule');

Route::get('/addLicensee', 'AddLicenseeController@index')->name('addlicensee');
Route::post('/addLicensee', 'AddLicenseeController@index')->name('savelicensee');
