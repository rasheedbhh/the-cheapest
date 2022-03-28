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
    //admin/subcategories routes
    Route::get('all/subcategories', 'AdminController@getSubcategories')->name('all.subcategories');
    Route::get('add/subcategory', 'AdminController@addSubcategory')->name('add.subcategory');
    Route::post('insert/subcategory', 'AdminController@insertSubcategory')->name('store.subcategory');
    Route::get('edit/subcategory/{id}', 'AdminController@editSubcategory');
    Route::post('update/subcategory/{id}', 'AdminController@updateSubcategory');
    Route::get('delete/subcategory/{id}', 'AdminController@deleteSubcategory');
    // admin/store routes
    Route::get('all/stores', 'AdminController@getStores')->name('all.stores');
    Route::get('add/store', 'AdminController@addStore')->name('add.store');
    Route::post('insert/store', 'AdminController@insertStore')->name('insert.store');
    Route::get('edit/store/{id}', 'AdminController@editStore');
    Route::post('update/store/{id}', 'AdminController@updateStore');
    Route::get('delete/store/{id}', 'AdminController@deleteStore');
    //admin/products routes
    Route::get('all/products', 'AdminController@getProducts')->name('all.products');
    Route::get('activate/product/{id}', 'ManagerController@makeActive');
    Route::get('deactivate/product/{id}', 'ManagerController@makeInactive');
    Route::get('onSale/product/{id}', 'ManagerController@onSale');
    Route::get('notOnSale/product/{id}', 'ManagerController@offSale');
    Route::get('trending/product/{id}', 'ManagerController@makeTrending');
    Route::get('notTrending/product/{id}', 'ManagerController@offTrending');
    Route::get('mainSlider/product/{id}', 'ManagerController@mainSliderActive');
    Route::get('notMainslider/product/{id}', 'ManagerController@mainSliderInactive');
    Route::get('midSlider/product/{id}', 'ManagerController@midSliderActive');
    Route::get('notminSlider/product/{id}', 'ManagerController@midSliderInactive');
});

//Manager Routes
Route::group(['middleware' => 'role:manager', 'prefix' => 'manager'], function() {

    Route::post('insert/store', 'ManagerController@insertStore')->name('insert.store');
    Route::get('edit/store', 'ManagerController@editStore')->name('edit.store');
    Route::post('update/store', 'ManagerController@updateStore')->name('update.store');

    Route::get('all/products', 'ManagerController@getProducts')->name('all.products');
    Route::get('add/product', 'ManagerController@addProduct')->name('add.product');
    Route::post('insert/product', 'ManagerController@insertProduct')->name('insert.product');
    Route::get('edit/product/{id}', 'ManagerController@editProduct');
    Route::post('update/product/{id}', 'ManagerController@updateProduct');
    Route::get('activate/product/{id}', 'ManagerController@makeActive');
    Route::get('deactivate/product/{id}', 'ManagerController@makeInactive');
    Route::get('delete/product/{id}', 'ManagerController@deleteProduct');
    Route::get('get/subcategory/{category_id}','ManagerController@getSubcategory');

    Route::get('my/orders', 'ManagerController@getOrders')->name('manager.orders');
    Route::get('delete/order/{id}', 'ManagerController@deleteOrder');
});