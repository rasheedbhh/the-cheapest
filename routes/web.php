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
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function() { 
    Route::get('/home', 'LoginController@index')->name('home');
});

//Admin Routes
Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function() {
    // admin/user routes
    Route::get('all/users', 'AdminController@getUsers')->name('all.users');
    Route::get('add/user', 'AdminController@addUser')->name('add.user');
    Route::post('insert/user', 'AdminController@insertUser')->name('store.user');
    Route::get('edit/user/{id}', 'AdminController@editUser')->name('update.user');
    Route::post('update/user/{id}', 'AdminController@updateUser');
    Route::get('delete/user/{id}', 'AdminController@deleteUser');
    // admin/categories routes 
    Route::get('all/categories', 'AdminController@getCategories')->name('all.categories');
    Route::get('add/category', 'AdminController@addCategory')->name('add.category');
    Route::post('insert/category', 'AdminController@insertCategory')->name('store.category');
    Route::get('edit/category/{id}', 'AdminController@editCategory');
    Route::post('update/category/{id}', 'AdminController@updateCategory');
    Route::get('delete/category/{id}', 'AdminController@deleteCategory');
    // admin/store routes
    Route::get('all/stores', 'AdminController@getStores')->name('all.stores');
    Route::get('add/store', 'AdminController@addStore')->name('add.store');
    Route::post('insert/store', 'AdminController@insertStore')->name('insert.store');
    Route::get('edit/store/{id}', 'AdminController@editStore');
    Route::post('update/store/{id}', 'AdminController@updateStore');
    Route::get('delete/store/{id}', 'AdminController@deleteStore');
});

//Manager Routes
Route::group(['middleware' => 'role:manager', 'prefix' => 'manager'], function() {

    Route::get('edit/store', 'ManagerController@editStore')->name('edit.store');
    Route::post('update/store/{id}', 'ManagerController@updateStore');

    Route::get('all/products', 'ManagerController@getProducts')->name('all.products');
    Route::get('add/product', 'ManagerController@addProduct')->name('add.product');
    Route::post('insert/product', 'ManagerController@insertProduct')->name('insert.product');
    Route::get('edit/product/{id}', 'ManagerController@editProduct');
    Route::post('update/product/{id}', 'ManagerController@updateProduct');
    Route::get('delete/product/{id}', 'ManagerController@deleteProduct');

    Route::get('my/orders', 'ManagerController@getOrders')->name('manager.orders');
    Route::get('delete/order/{id}', 'ManagerController@deleteOrder');
});