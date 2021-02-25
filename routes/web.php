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

//frontend

Route::get('','frontend\HomeController@GetHome');
Route::get('contact','frontend\HomeController@GetContact');
Route::get('about','frontend\HomeController@GetAbout');
Route::get('search','frontend\HomeController@Getsearch');
Route::group(['prefix' => 'product'], function () {
    Route::get('','frontend\ProductController@ListProduct');
    Route::get('detail/{id}','frontend\ProductController@DetailProduct');
    Route::get('cart','frontend\ProductController@GetCart');
    Route::get('addcart','frontend\ProductController@AddCart');
    Route::get('removecart/{id}','frontend\ProductController@RemoveCart');
    Route::get('updatecart/{rowId}/{qty}','frontend\ProductController@UpdateCart');
    Route::get('checkout','frontend\ProductController@CheckOut');
    Route::post('checkout','frontend\ProductController@PostCheckOut');
    Route::get('complete/{id_customer}','frontend\ProductController@complete');



});
//backend
Route::get('auth/google', 'backend\GoogleController@redirectToGoogle');
Route::get('callback', 'backend\GoogleController@handleGoogleCallback');
Route::get('logout/google', 'backend\GoogleController@logoutGoogle');
Route::get('login','backend\LoginController@GetLogin' )->middleware('CheckLogout');
Route::post('login','backend\LoginController@PostLogin' );


Route::group(['prefix' => 'admin','middleware'=>'CheckLogin'], function() {
    Route::get('','backend\LoginController@GetIndex' );
    Route::get('logout','backend\LoginController@Logout' );

    Route::group(['prefix' => 'category'], function() {
        Route::get('','backend\CategoryController@GetCategory' );
        Route::post('','backend\CategoryController@PostCategory' );
        Route::get('edit/{id}','backend\CategoryController@EditCategory');
        Route::post('edit/{id}','backend\CategoryController@PostEditCategory');
        Route::get('del/{id}','backend\CategoryController@DelCategory' );
    });

    Route::group(['prefix' => 'product'], function() {
        Route::get('','backend\ProductController@ListProduct' );
        Route::get('add','backend\ProductController@AddProduct' );
        Route::post('add','backend\ProductController@PostProduct' );

        Route::get('edit/{id}','backend\ProductController@EditProduct' );
        Route::post('edit/{id}','backend\ProductController@PostEditProduct' );

        Route::get('del/{id}','backend\ProductController@DelProduct' );


        Route::post('add-attr','backend\ProductController@AddAttr' );
        Route::get('detail-attr','backend\ProductController@DetailAttr' );
        Route::get('edit-attr/{id}','backend\ProductController@EditAttr' );
        Route::post('edit-attr/{id}','backend\ProductController@PostAttr');
        Route::get('del-attr/{id}','backend\ProductController@DelAttr' );

        Route::post('add-value','backend\ProductController@AddValue');
        Route::get('edit-value/{id}','backend\ProductController@EditValue' );
        Route::post('edit-value/{id}','backend\ProductController@PostEditValue' );
        Route::post('add-value/{id}','backend\ProductController@PostAddValue' );
        Route::get('del-value/{id}','backend\ProductController@DelValue' );

        Route::get('add-variant/{id}','backend\ProductController@AddVariant' );
        Route::post('add-variant/{id}','backend\ProductController@PostAddVariant' );
        Route::get('edit-variant/{id}','backend\ProductController@EditVariant' );
        Route::post('edit-variant/{id}','backend\ProductController@PostEditVariant' );
        Route::get('del-variant/{id}','backend\ProductController@DelVariant' );
    });

    Route::group(['prefix' => 'order'], function() {
        Route::get('','backend\OrderController@ListOrder' );
        Route::get('detail/{customer_id}','backend\OrderController@DetailOrder' );
        Route::get('active/{customer_id}','backend\OrderController@ActiveOrder' );
        Route::get('processed','backend\OrderController@ProcessedOrder' );

    });
    Route::group(['prefix' => 'user'], function() {
        Route::get('','backend\UserController@ListUser' );
        Route::get('add','backend\UserController@AddUser' );
        Route::post('add','backend\UserController@PostAddUser' );
        Route::get('edit/{id}','backend\UserController@EditUser' );
        Route::post('edit/{id}','backend\UserController@PostEditUser' );
        Route::get('del/{id}','backend\UserController@DelUser' );


    });


});
