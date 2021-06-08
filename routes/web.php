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

Route::get('/', 'WelcomeController@index');
Route::get('/category-view/{id}', 'WelcomeController@category');
Route::get('/product-details/{id}', 'WelcomeController@productDetails');
Route::post('/cart/add', 'CartController@addToCart');
Route::get('/cart/show', 'CartController@showCart');
Route::get('/cart/delete/{id}', 'CartController@deleteCartProduct');

Route::get('/checkout', 'CheckoutController@index');
Route::post('/checkout/sign-up', 'CheckoutController@customerRegistration');
Route::get('/checkout/shipping', 'CheckoutController@showShippingForm');
Route::post('/checkout/save-shipping', 'CheckoutController@saveShippingInfo');
Route::get('/checkout/payment', 'CheckoutController@showPaymentForm');
Route::post('/checkout/save-order', 'CheckoutController@saveOrderInfo');
Route::get('/checkout/my-home', 'CheckoutController@customerHome');

Auth::routes();
Route::get('/dashboard', 'HomeController@index');



Route::group(['middleware' => 'AuthenticateMiddleware'], function () {
    /* Category Info */
    Route::get('/category/add', 'CategoryController@createCategory');
    Route::post('/category/save', 'CategoryController@storeCategory');
    Route::get('/category/manage', 'CategoryController@manageCategory');
    Route::get('/category/edit/{id}', 'CategoryController@editCategory');
    Route::post('/category/update', 'CategoryController@updateCategory');
    Route::get('/category/delete/{id}', 'CategoryController@deleteCategory');
    /* Category Info */

    /* /Manufacturer/add Info */
    Route::get('/manufacturer/add', 'ManufacturerController@createManufacturer');
    Route::post('/manufacturer/save', 'ManufacturerController@storeManufacturer');
    Route::get('/manufacturer/manage', 'ManufacturerController@manageManufacturer');
    Route::get('/manufacturer/edit/{id}', 'ManufacturerController@editManufacturer');
    Route::post('/manufacturer/update', 'ManufacturerController@updateManufacturer');
    Route::get('/manufacturer/delete/{id}', 'ManufacturerController@deleteManufacturer');
    /* Manufacturer Info */

    /* /Product/add Info */
    Route::get('/product/add', 'ProductController@createProduct');
    Route::post('/product/save', 'ProductController@storeProduct');
    Route::get('/product/manage', 'ProductController@manageProduct');
    Route::get('/product/view/{id}', 'ProductController@viewProduct');
    Route::get('/product/edit/{id}', 'ProductController@editProduct');
    Route::post('/product/update', 'ProductController@updateProduct');
    Route::get('/product/delete/{id}', 'ProductController@deleteProduct');
    /* Product Info */
    
    Route::get('/user/manage', 'UserController@manageUser');
    
    
});
