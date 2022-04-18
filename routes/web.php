<?php

use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;

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
    Route::get('popular/{id}', 'AdminController@makePopular');
    Route::get('notpopular/{id}', 'AdminController@makeNotPopular');
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
    Route::get('requests/stores', 'AdminController@storeRequests')->name('requests.stores');
    Route::get('accept/request/{id}', 'AdminController@acceptRequest');
    Route::get('decline/request/{id}','AdminController@declineRequest')->name('decline.request');
    Route::post('insert/store', 'AdminController@insertStore')->name('insert.store');
    Route::get('edit/store/{id}', 'AdminController@editStore');
    Route::post('update/store/{id}', 'AdminController@updateStore');
    Route::get('delete/store/{id}', 'AdminController@deleteStore');
    //admin/products routes
    Route::get('all/products', 'AdminController@getProducts')->name('admin.all.products');
    Route::get('get/product/{id}', 'AdminController@getProduct');
    Route::get('activate/product/{id}', 'AdminController@makeActive');
    Route::get('deactivate/product/{id}', 'AdminController@makeInactive');
    Route::get('onSale/product/{id}', 'AdminController@onSale');
    Route::get('notOnSale/product/{id}', 'AdminController@offSale');
    Route::get('trending/product/{id}', 'AdminController@makeTrending');
    Route::get('notTrending/product/{id}', 'AdminController@offTrending');
    Route::get('best_seller/product/{id}', 'AdminController@best_seller_off');
    Route::get('not_best_seller/product/{id}', 'AdminController@best_seller_on');
    Route::get('midSlider/product/{id}', 'AdminController@midSliderActive');
    Route::get('notmidSlider/product/{id}', 'AdminController@midSliderInactive');
    Route::get('weekly/product/{id}', 'AdminController@toggleWeekly');
    Route::get('notweekly/product/{id}', 'AdminController@offWeekly');
    //orders
    Route::get('orders','AdminController@getOrders')->name('admin.orders');
});

//Manager Routes
Route::group(['middleware' => 'role:manager', 'prefix' => 'manager'], function() {

    Route::post('insert/store', 'ManagerController@insertStore')->name('manager.insert.store');
    Route::get('edit/store', 'ManagerController@editStore')->name('manager.edit.store');
    Route::post('update/store', 'ManagerController@updateStore')->name('manager.update.store');

    Route::get('all/products', 'ManagerController@getProducts')->name('manager.all.products');
    Route::get('add/product', 'ManagerController@addProduct')->name('manager.add.product');
    Route::post('insert/product', 'ManagerController@insertProduct')->name('manager.insert.product');
    Route::get('edit/product/{id}', 'ManagerController@editProduct');
    Route::post('update/product/{id}', 'ManagerController@updateProduct');
    Route::get('activate/product/{id}', 'ManagerController@makeActive');
    Route::get('deactivate/product/{id}', 'ManagerController@makeInactive');
    Route::get('delete/product/{id}', 'ManagerController@deleteProduct');
    Route::get('get/subcategory/{category_id}','ManagerController@getSubcategory');
    Route::get('my/orders', 'ManagerController@getOrders')->name('manager.orders');
    Route::get('delete/order/{id}', 'ManagerController@deleteOrder');
});

Route::group(['middleware' => 'role:user', 'prefix' => 'user'], function() {
    Route::get('product/view/{id}', 'UserController@getProduct');
    Route::post('add/to/wishlist', 'UserController@addProduct')->name('add.to.wishlist');
    Route::get('my/wishlist/{id}', 'UserController@myWishlist')->name('wishlist');
});

Route::get('all/products', 'UserController@allProducts')->name('all.products');