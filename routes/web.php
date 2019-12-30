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
Route::match(['get', 'post'], '/admin', 'adminController@login');
Route::get('/admin/dashboard', 'adminController@dashboard');
Route::post('/admin/dashboard/insertFlight', 'adminController@insertFlight');
Route::get('/admin/dashboard/editFlight/{id}', 'adminController@editFlight')->name('flightEdit');
Route::post('/admin/dashboard/confirmFlightEdit/{id}', 'adminController@confirmFlightEdit')->name('confirmFlightEdit');
Route::get('/admin/dashboard/delete/{id}', 'adminController@deleteFlight' )->name('deleteFlight');
Route::post('/admin/planes/insertPlane', 'adminController@insertPlane');
Route::get('/admin/planes/editPlane/{id}', 'adminController@editPlane')->name('planeEdit');
Route::post('/admin/planes/confirmPlaneEdit/{id}', 'adminController@confirmPlaneEdit')->name('confirmPlaneEdit');
Route::get('/admin/planes/delete/{id}', 'adminController@deletePlane' )->name('deletePlane');
Route::post('/admin/airports/insertAirport', 'adminController@insertAirport');
Route::get('/admin/airports/editAirport/{id}', 'adminController@editAirport')->name('airportEdit');
Route::post('/admin/airports/confirmAirportEdit/{id}', 'adminController@confirmAirportEdit')->name('confirmAirportEdit');
Route::get('/admin/airports/delete/{id}', 'adminController@deleteAirport' )->name('deleteAirport');
Route::post('/admin/tickets/insertTicket', 'adminController@insertTicket');
Route::get('/admin/tickets/editTicket/{id}', 'adminController@editTicket')->name('ticketEdit');
Route::post('/admin/tickets/confirmTicketEdit/{id}', 'adminController@confirmTicketEdit')->name('confirmTicketEdit');
Route::get('/admin/tickets/delete/{id}', 'adminController@deleteTicket' )->name('deleteTicket');
Route::get('/admin/flights', function (){
    return redirect('admin/dashboard');
});
Route::get('/admin/planes', 'adminController@planes');
Route::get('/admin/airports', 'adminController@airports');
Route::get('/admin/tickets', 'adminController@tickets');
Route::get('/logout', 'adminController@logout');
//Route::group(['middleware' => ['auth']], function (){
//    Route::get('/admin/dashboard', 'adminController@dashboard');
//});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/searchTickets', 'HomeController@searchTickets')->name('searchTickets');
Route::post('/confirmPurchase', 'HomeController@confirmPurchase')->name('confirmPurchase');
Route::get('/flights', 'FlightsController@index')->name('flights');
Route::get('/ticket', 'TicketController@index');
Route::get('/myTicket', 'TicketController@searchTicket')->name('myTicket');


