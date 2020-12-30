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
    return view('index');
});

Route::get('/delivery',function (){
    return view('delivery_info');
})->name('delivery');

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
});


Auth::routes();

//Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/my_profile','UserController@profile')->name('user.profile')->middleware('auth');
Route::get('/my_purchases','UserController@profile')->name('user.purchases');
Route::post('/my_purchases','UserController@update')->name('user.update');

Route::get('/contact', 'ContactUsController@index')->name('contact');

Route::get('/wishlist','UserController@wishList')->name('user.wishList');
Route::post('/wishlist','UserController@addToWishList')->name('user.addToWishList');

Route::get('product/basket','ProductController@basket')->name('basket');

Route::get('selling-points','SellingPointsController@index')->name('points');

Route::get('product/new_products','ProductController@newProducts')->name('product.new');
Route::get('product/all','ProductController@all')->name('product.all');
Route::get('product/cat/{id}','ProductController@allByCategory')->name('product.allByCat');
Route::get('product/cat/{id}/{subId}','ProductController@allBySubCategory')->name('product.allBySubCat');
Route::get('product/{id}','ProductController@detail')->name('product.detail');
Route::post('product/{id}/review','ProductController@productReview')->name('product.review');
Route::post('add_to_cart/{id?}','ProductController@addToCard')->name('product.addToCart');
Route::get('product/remove_cart/{id}','ProductController@removeCart')->name('product.removeCart');

Route::get('share/all', 'ShareController@all')->name('share.all');
Route::get('share/{id}', 'ShareController@detail')->name('share.detail');
Route::post('share/add_to_cart/{id?}', 'ShareController@addToCart')->name('share.addToCart');
Route::post('share/remove_cart/{id}', 'ShareController@removeCart')->name('share.removeCart');

Route::get('purchase_reg','TransactionController@getForm')->name('transaction.getForm');

Route::get('sales/all', 'SaleController@all')->name('sale.all');
//Route::get('sales/addToCat', 'SaleController@addToCart')->name('sale.addToCart');

Route::get('news', 'NewsController@index')->name('news');
Route::get('news/{id}', 'NewsController@detail')->name('news.detail');

Route::get('articles', 'ArticleController@view')->name('articles');
Route::get('articles/{id}', 'ArticleController@detail')->name('articles.detail');

Route::get('reviews','ReviewsController@index')->name('reviews');
Route::get('reviews/all','ReviewsController@indexAll')->name('reviews.all');
Route::post('reviews/add','ReviewsController@add')->name('reviews.add');

Route::post('transaction', 'TransactionController@pay')->name('transaction.pay');
Route::get('payment_info', function (){
    return view('payment_info');
});

Route::get('wholesalers', function (){
   return view('wholesalers');
});

Route::get('purchase_terms', function (){
   return view('purchase_terms');
});

Route::get('advantages', function (){
   return view('advantages');
});

Route::post('call-me', 'CallToMeController@send')->name('call-me.send');

Route::get('test', 'TestController@test1')->name('test');


