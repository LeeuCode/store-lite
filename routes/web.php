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

// Route::get('/home', 'HomeController@index');


// Route::group(['middleware' => 'auth'], function () {

    Route::resource('/','indexController');
    Route::resource('/items','itemsController');
    Route::resource('/companies','companiesController');
    Route::resource('/categories','categoriesController');
    Route::resource('/unities','unitiesController');

    // store actions
    Route::get('/stores','storesController@index');
    Route::get('/store/edit/{id}','storesController@edit');
    Route::get('/store/items/{id}','storesController@items');
    Route::get('/store/create','storesController@create');
    Route::get('/store/receptions/{id}','storesController@receptions');
    Route::get('/store/dismissals/{id}','storesController@dismissals');
    Route::get('/store/reactionaries/{id}','storesController@reactionaries');
    
    // Store Bills
    Route::post('/store/save-store','storesController@saveStore');
    Route::get('/store/reception/bill/{id}', 'storesController@receptionBill');
    Route::get('/store/dismissal/bill/{id}','storesController@dismissalBill');
    Route::get('/store/reactionaries/bill/{id}','storesController@reactionaryBill');

    // Reception actions
    Route::get('/treasury-bonds/reception','TreasuryBondsController@reception');
    Route::get('/treasury-bonds/reception/{req}','TreasuryBondsController@reception');
    Route::get('/treasury-bonds/reception/{req}/{id}','TreasuryBondsController@reception');
    Route::post('/treasury-bonds/reception/save','TreasuryBondsController@receptionSave');

    // Dismissal actions
    Route::get('/treasury-bonds/dismissal','TreasuryBondsController@dismissal');
    Route::get('/treasury-bonds/dismissal/{req}','TreasuryBondsController@dismissal');
    Route::get('/treasury-bonds/dismissal/{req}/{storeId}/{id}','TreasuryBondsController@dismissal');
    Route::post('/treasury-bonds/dismissal/save','TreasuryBondsController@dismissalSave');

    // Reactionary
    Route::get('/treasury-bonds/reactionary','TreasuryBondsController@reactionary');
    Route::get('/treasury-bonds/reactionary/{req}','TreasuryBondsController@reactionary');
    Route::get('/treasury-bonds/reactionary/{req}/{storeId}/{id}','TreasuryBondsController@reactionary');
    Route::post('/treasury-bonds/reactionary/save','TreasuryBondsController@reactionarySave');

    // Reports
    Route::get('/reports/test','reportsController@test');

    // User Root
    Route::get('/users','usersController@index');
    Route::get('/user/create','usersController@create');
    Route::get('/user/profile/{id}','usersController@profile');
    Route::post('/user/save','usersController@save');

    // Settings Root
    Route::get('/settings','settingsController@index');

    // Select2 Ajax request.
    Route::get('/ajax/stores','indexController@stores');
    Route::get('/ajax/companies','indexController@companies');
    Route::get('/ajax/categories','indexController@categories');
    Route::get('/ajax/unities','indexController@unities');

// });

