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
Route::get('/users', 'HomeController@show');

Route::get('/create_society', 'SocietyController@create')->name('society');
Route::post('/post_society', 'SocietyController@store');
Route::get('/edit_society/{id}', 'SocietyController@edit');
Route::post('/update_society/{id}', 'SocietyController@update');
Route::get('/delete_society/{id}', 'SocietyController@delete');
Route::get('/show_society', 'SocietyController@show');

Route::get('/create_societymember', 'SocietyMemberController@create');
Route::post('/store_societymember', 'SocietyMemberController@store');
Route::get('/edit_societymember/{id}', 'SocietyMemberController@edit');
Route::get('/delete_societymember/{id}', 'SocietyMemberController@delete');
Route::post('/update_societymember/{id}', 'SocietyMemberController@update');
Route::get('/show_societymember', 'SocietyMemberController@show');
Route::post('/search_society_member', 'SocietyMemberController@search');
Route::get('/detail/{id}', 'SocietyMemberController@details');


Route::get('/create_flat', 'FlatController@create');
Route::post('/store_flat', 'FlatController@store');
Route::get('/edit_flat/{id}', 'FlatController@edit');
Route::get('/delete_flat/{id}', 'FlatController@delete');
Route::post('/update_flat/{id}', 'FlatController@update');
Route::get('/show_flats', 'FlatController@show');
Route::post('/search_flats', 'FlatController@search');

Route::get('/create_tenant', 'TenantController@create');
Route::post('/store_tenant', 'TenantController@store');
Route::get('/edit_tenant/{id}', 'TenantController@edit');
Route::get('/delete_tenant/{id}', 'TenantController@delete');
Route::post('/update_tenant/{id}', 'TenantController@update');
Route::get('/show_tenants', 'TenantController@show');

Route::get('/create_maintenance', 'MaintenanceController@create');
Route::post('/store_maintenance', 'MaintenanceController@store');
Route::get('/edit_maintenance/{id}', 'MaintenanceController@edit');
Route::post('/update_maintenance/{id}', 'MaintenanceController@update');
Route::get('/show_maintenances', 'MaintenanceController@show');


Route::get('/create_maintenance_bill', 'MaintenanceBillController@create');
Route::post('/store_maintenance_bill', 'MaintenanceBillController@store');
Route::get('/edit_maintenance_bill/{id}', 'MaintenanceBillController@edit');

Route::post('/update_maintenance_bill/{id}', 
										'MaintenanceBillController@update');

Route::get('/delete_maintenance_bill/{id}', 'MaintenanceBillController@delete');
Route::get('/show_maintenance_bills', 'MaintenanceBillController@show');
Route::get('/generate_maintenance_bill', 'MaintenanceBillController@generate');
Route::post('/send', 'MaintenanceBillController@send');
Route::get('/downloadPDF/{id}', 'MaintenanceBillController@download');



Route::get('/create_payment', 'PaymentController@create');
Route::post('/store_payment', 'PaymentController@store');
Route::get('/edit_payment/{id}', 'PaymentController@edit');
Route::get('/delete_payment/{id}', 'PaymentController@delete');
Route::post('/update_payment/{id}', 'PaymentController@update');
Route::get('/show_payments', 'PaymentController@show');


Route::get('/create_societyboardmember', 'SocietyBoardMemberController@create');
Route::post('/store_societyboardmember', 'SocietyBoardMemberController@store');
Route::get('/edit_societyboardmember/{id}', 'SocietyBoardMemberController@edit');
Route::get('/delete_societyboardmember/{id}', 'SocietyBoardMemberController@delete');
Route::post('/update_societyboardmember/{id}', 'SocietyBoardMemberController@update');
Route::get('/show_societyboardmember', 'SocietyBoardMemberController@show');


Route::get('/detail/{id}', 'SocietyMemberController@detail');