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
    return redirect()->route('admin'); 
});	

Route::get('/admin', function () {
    return view('admin');
})->middleware('auth')->name('admin');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    
    Route::resource('companies', 'Admin\CompaniesResourceController');
    

    Route::resource('employees', 'Admin\EmployeesResourceController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
