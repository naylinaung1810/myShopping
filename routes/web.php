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

Route::get('/',
    [
     'uses'=>'UserController@getWelcome',
     'as'=>'/'
    ]);

Route::get('/home',
    [
        'uses'=>'UserController@getHome',
        'as'=>'home.fe'
    ]);

Route::get('/products/id/{id}',
    [
        'uses'=>'UserController@getProduct',
        'as'=>'product.get'
    ]);

Route::get('/order/delete',
    [
        'uses'=>'UserController@deleteOrder',
        'as'=>'order.delete'
    ]);

Route::get('/products/detail/id/{id}',
    [
        'uses'=>'UserController@getProductDetail',
        'as'=>'product.detail'
    ]);

//Route::get('/get/all/posts',
//    [
//        'uses'=>'UserController@getAllPosts',
//    ]);

Route::get('/login',[
    'uses'=>'AuthController@getLogin',
    'as'=>'login'
]);

Route::post('/login',[
    'uses'=>'AuthController@postLogin',
    'as'=>'login'
]);

Route::get('/post/image/{img_name}',[
    'uses'=>'PostController@getPostImage',
    'as'=>'images'
]);

Route::get('/add/cart',[
    'uses'=>'UserController@getAddCart',
    'as'=>'add.cart'
]);

Route::get('/cart',[
    'uses'=>'UserController@getCart',
    'as'=>'cart.get'
]);

Route::get('/get/cart/count',[
    'uses'=>'UserController@getCartCount',
]);

Route::get('/cart/minus',[
    'uses'=>'UserController@getMinusCart',
]);

Route::get('/cart/plus',[
    'uses'=>'UserController@getPlusCart',
]);

Route::post('/cart/checkout',[
    'uses'=>'UserController@postCheckOut',
    'as'=>'checkout'
]);

Route::get('/order/id/{id}',[
    'uses'=>'UserController@getOrderDetail',
    'as'=>'order.vouncher'
]);




//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function (){

    Route::group(['middleware' => ['role:admin|editor']],function (){
        Route::get('/logout',[
            'uses'=>'AuthController@getLogout',
            'as'=>'logout'
        ]);
        Route::get('/dashboard',[
            'uses'=>'AdminController@getDashboard',
            'as'=>'dashboard'
        ]);

        Route::get('/add/new-post',[
            'uses'=>'PostController@getNewPost',
            'as'=>'new-post'
        ]);

        Route::post('/add/new-post',[
            'uses'=>'PostController@postNewPost',
            'as'=>'new-post'
        ]);

        Route::get('/image/{img_name}',[
            'uses'=>'AdminController@getImages',
            'as'=>'image'
        ]);


        Route::get('/posts',[
            'uses'=>'PostController@getPosts',
            'as'=>'posts'
        ]);

        Route::get('/order',[
            'uses'=>'OrderController@getOrders',
            'as'=>'admin.order'
        ]);

        Route::get('/order/deliver/{id}',[
            'uses'=>'OrderController@getOrderDeliver',
            'as'=>'order.deliver'
        ]);
    });

    Route::group(['middleware' => ['role:admin']],function () {
        Route::get('/add/new-user',[
            'uses'=>'AuthController@getNewUser',
            'as'=>'new-user'
        ]);

        Route::post('/add/new-user',[
            'uses'=>'AuthController@postNewUser',
            'as'=>'new-user'
        ]);

        Route::get('/all/users',[
            'uses'=>'AdminController@getUsers',
            'as'=>'users'
        ]);

        Route::get('/add/new-category',[
            'uses'=>'AdminController@getNewCategory',
            'as'=>'new-category'
        ]);

        Route::post('/add/new-category',[
            'uses'=>'AdminController@postNewCategory',
            'as'=>'new-category'
        ]);

        Route::get('/all/categories',[
            'uses'=>'AdminController@getCategories',
            'as'=>'categories'
        ]);


        Route::get('/image/{id}/remove',[
            'uses'=>'AdminController@removeImage',
            'as'=>'category.remove'
        ]);

        Route::get('/user/{id}/detail',[
            'uses'=>'AdminController@getUserDetail',
            'as'=>'user.detail'
        ]);

        Route::get('/post/{id}/delete',[
            'uses'=>'PostController@getPostDelete',
            'as'=>'delete.post'
        ]);

        Route::get('/post/{id}/edit',[
            'uses'=>'PostController@getPostEdit',
            'as'=>'post.edit'
        ]);

        Route::post('/post/edit',[
            'uses'=>'PostController@postPostEdit',
            'as'=>'post.edits'
        ]);
    });



});