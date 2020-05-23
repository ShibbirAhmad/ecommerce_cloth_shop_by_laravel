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
    view()->composer('site.layout.header', function ($view) {
         $session_id=session_id();
        $cart=App\Cart::where('session_id',$session_id)->get()->count();
        $view->with('cart_quantity',$cart);
 
    });
    
     //route for home page
     Route::get('/','HomeController@index')->name('home');
     
     //route for product details
     Route::get('product-details/{slug}','SiteController@index')->name('product.details');

     //route for cart product
     Route::get('cart','CartController@index')->name('cart');
     Route::post('cart/{id}','CartController@addToCart')->name('add.cart');
     Route::PATCH('cart/{id}','CartController@updateCart')->name('update.cart');
     Route::delete('cart/{id}','CartController@cartDelete')->name('delete.cart');
    
    

     //rout group for authenticate custmoer 
     Route::group(['middleware' => ['auth','customer'] ], function () {

          Route::get('checkout','OrderController@index')->name('checkout');
          Route::post('order','OrderController@storeOrder')->name('order'); 
          Route::get('payment','PaymentController@index')->name('payment');
          Route::post('payment-receieve','PaymentController@paymentReceieve')->name('payment.add');
          Route::delete('deleted-alr-cart','CartController@ordered_product_removeCart')->name('clear.cart');
     
         
     });

Auth::routes();



Route::post('subscriber','SubscriberController@index')->name('subscriber');


//this group for admin 
Route::group(['as' => 'admin.','prefix' => 'admin' , 'namespace' => 'Admin', 'middleware'=> ['auth','admin']], function () {
    
     Route::get('dashboard',['as' => 'dashboard' , 'uses' => 'DashboardController@index']); 
     Route::resource('tag', 'TagsController'); 
     Route::resource('category', 'CategoryController'); 
     Route::resource('post', 'PostController');
     Route::resource('product', 'ProductController');

     //route for pending post aprove
     Route::get('pending/post','PostController@pending')->name('post.pending');
     Route::PATCH('/post/{id}/approve','PostController@approve')->name('post.approve');

     //route for pending post aprove
     Route::get('pending/product','ProductController@pending')->name('product.pending');
     Route::PATCH('/product/{id}/approve','ProductController@approve')->name('product.approve');
     
     //route for subscribers
     Route::get('subscriber','SubscriberController@index')->name('subscriber');
     Route::delete('subscriber/{id}','SubscriberController@destroy')->name('subscriber.destroy');
    
     });


//this route group for author
Route::group(['as' => 'author.','prefix' => 'author' , 'namespace' => 'Author', 'middleware'=> ['auth','author']], function () {
    
    Route::get('dashboard',['as' => 'dashboard' , 'uses' => 'DashboardController@index']);  
    Route::resource('post', 'PostController');
    Route::resource('product', 'ProductController');


});










