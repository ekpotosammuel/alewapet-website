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
    return view('/home');
});

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['prefix' => 'vendors', 'middleware' => ['fumigation.auth']], function() {
    Route::get('/', 			'VendorController@index')->name('vendors');
    Route::get('/view',         'VendorController@view')->name('show');
    Route::get('/create',       'VendorController@create');
    Route::post('/store',      'VendorController@store');
    Route::get('/edit/{id}',   'VendorController@edit');
    Route::post('/update/{id}',  'VendorController@update');
    Route::delete('/delete', 	'VendorController@deleteOne');
});


Route::group(['prefix' => 'decontaminations'], function() {
    Route::get('/', 			'DecontaminationController@index')->name('decontaminations');
    Route::get('/show',         'DecontaminationController@show');
    Route::get('/create',       'DecontaminationController@create');

    Route::post('/store',      'DecontaminationController@store');
    Route::get('/edit/{id}',   'DecontaminationController@edit');
    Route::post('/update/{id}',  'DecontaminationController@update');
    Route::delete('/delete', 	'DecontaminationController@deleteOne');
});

Route::group(['prefix' => 'decontaminationcertificates'], function() {
    Route::get('/',             'DecontaminationCertificateController@index')->name('decontaminationcertificates');
    Route::get('/show',         'DecontaminationCertificateController@show');
    Route::get('/create',       'DecontaminationCertificateController@create');

    Route::post('/store',      'DecontaminationCertificateController@store');
    Route::get('/edit/{id}',   'DecontaminationCertificateController@edit');
    Route::post('/update/{id}',  'DecontaminationCertificateController@update');
    Route::delete('/delete',    'DecontaminationCertificateController@deleteOne');
});

Route::group(['prefix' => 'fumigations', 'middleware' => ['fumigation.auth']], function() {
    Route::get('/', 			'FumigationController@index')->name('fumigations');
    Route::get('/view',         'FumigationController@view')->name('fumigations_show');
    Route::get('/create',       'FumigationController@create');
    Route::post('/store',      'FumigationController@store');
    Route::get('/edit/{id}',   'FumigationController@edit');
    Route::post('/update/{id}',  'FumigationController@update');
    Route::delete('/delete', 	'FumigationController@deleteOne');
    Route::get('/createPDF',  'FumigationController@createPDF')->name('createPDF');
});

Route::group(['prefix' => 'fumigationcertificates', 'middleware' => ['fumigation.auth']], function() {
    Route::get('/',             'FumigationCertificateController@index')->name('fumigationcertificates');
    Route::get('/view',         'FumigationCertificateController@view')->name('fumigationcertificates_show');
    Route::get('/create',       'FumigationCertificateController@create');
    Route::post('/store',      'FumigationCertificateController@store');
    Route::get('/edit/{id}',   'FumigationCertificateController@edit');
    Route::post('/update/{id}',  'FumigationCertificateController@update');
    Route::delete('/delete',    'FumigationCertificateController@deleteOne');
});

Route::group(['prefix' => 'demands', 'middleware' => ['secretary.auth']], function() {
    Route::get('/',             'DemandController@index')->name('demands');
    Route::get('/view',         'DemandController@view')->name('demands_show');
    Route::get('/create',       'DemandController@create');
    Route::post('/store',      'DemandController@store');
    Route::get('/edit/{id}',   'DemandController@edit');
    Route::post('/update/{id}',  'DemandController@update');
    Route::delete('/delete',    'DemandController@deleteOne');
    Route::get('/preview',  'DemandController@previewAll')->name('demands_preview');
    Route::get('/createPDF',  'DemandController@createPDF')->name('createPDF');
    
});


Route::group(['prefix' => 'uploads'], function() {
    Route::get('/',             'UploadFumigationController@index')->name('upload_fumigation');
    Route::post('/',            'UploadFumigationController@upload')->name('upload_file');
});

Route::group(['prefix' => 'uploaddecontamination'], function() {
    Route::get('/',             'UploadDecontaminationController@index')->name('upload_decontamination');
    Route::post('/',            'UploadDecontaminationController@upload')->name('upload_file');
});

Route::group(['prefix' => 'uploadvedor'], function() {
    Route::get('/',             'UploadDecontaminationController@index')->name('upload_vendor');
    Route::post('/',            'UploadDecontaminationController@upload')->name('upload_file');
});

Route::group(['prefix' => 'payments', 'middleware' => ['secretary.auth']], function() {
    Route::get('/',             'SubscriptionController@index');
    Route::get('/view',             'SubscriptionController@view');
    Route::get('/show-form',      'SubscriptionController@showForm');
    Route::post('/pay',      'SubscriptionController@store')->name('pay');
    Route::get('/successful',      'SubscriptionController@successful')->name('successful');
    Route::get('/receipt',      'SubscriptionController@receipt')->name('receipt');
    Route::get('/edit/{id}',   'SubscriptionController@edit');
    Route::post('/update/{id}',  'SubscriptionController@update');
    // Route::delete('/delete',    'SubscriptionController@deleteOne');
});

// Route::group(['prefix' => 'receipt'], function() {
//     Route::get('/', 'ReceiptController@index');
//     Route::post('/', 'ReceiptController@store');
//     Route::get('/{id}', 'ReceiptController@show')->name('receipt');
// });

/*
|--------------------------------------------------------------------------
| User Controller
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'users', 'middleware' => ['admin.auth']], function () {
    Route::get('/',             'UserController@index')->name('users.index');
    Route::get('/create',         'UserController@create');
    Route::post('/store',       'UserController@store');
    Route::get('/edit/{id}',    'UserController@edit');
    Route::post('/update/{id}',       'UserController@update');
});












