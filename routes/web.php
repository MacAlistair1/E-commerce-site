<?php

use App\Cart;
use App\Wishlist;
use App\Userhistory;

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

Route::get('/', 'PageController@landingPage')->name('landingpage');
Route::get('/products/{catslug}/{id}', 'PageController@product');

//Route::get('/products/{catslug}/products/{catslug1}/all', 'PageController@shopme');

Route::get('/{catslug}/{subcatslug}/{slug}', 'PageController@productdetail');
Route::get('/cart', 'PageController@cart')->name('mycart.list');
Route::get('/checkout', 'PageController@checkout');
Route::post('/search', 'PageController@search')->name('product.search');
Route::get('/wishlist', 'PageController@wishlist');
Route::get('/about', 'PageController@about');
Route::get('/contact', 'PageController@contact');
Route::get('/register-me', 'PageController@registerme');
Route::post('/register-me', 'RegisterMeController@store')->name('register.me');
Route::get('/hot-sale', 'PageController@sale');
Route::get('/wholesale', 'PageController@wholesale');
Route::post('/my-cart', 'CartController@store')->name('mycart.store');
Route::patch('/my-cart-update/{product}', 'CartController@update')->name('mycart.update');
Route::get('/my-cart/{id}', function($id){
    $cart = Cart::where('id', $id)->first();
    $cart->delete();
    return back()->with('success', 'Item removed from Cart!');
});

Route::resource('/my-wishlist', 'WishlistController');
Route::get('/my-wishlist-del/{id}', function($id){
    $wishlist = Wishlist::where('id', $id)->first();
    $wishlist->delete();
    return back()->with('success', 'Item removed from Wishlist!');
});

Route::resource('/checkout-section', 'CheckoutDetailController');
Route::resource('/subscribers', 'SubscriberController');
Route::resource('/feedbacks', 'FeedbackController');

Route::get('/my-orders', 'PageController@orders');
Route::get('/my-history', 'PageController@history');



Route::get('/products/{slug}/products/{myslug}/range/{myrange}', 'PageController@ranger');

Route::get('/filtered/{slug}/range/{range}', 'FilterController@filterproduct');

Auth::routes();


Route::get('/admin/home', 'AdminController@index')->name('admin.home');

Route::get('/admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin', 'Admin\LoginController@login');
Route::post('/admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/admin-password/reset', 'Admin\ResetPasswordController@reset')->name('admin.password.update');
Route::get('/admin-password/reset/{tokem}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

Route::get('verify/send-mail-done/{email}/{verifytoken}', 'Auth\RegisterController@sendEmailDone')->name('send-mail-done');


Route::get('/admin/manage-category', 'AdminController@category')->name('admin.category');
Route::get('/admin/manage-sub-category', 'AdminController@subcategory')->name('admin.subcategory');
Route::get('/admin/add-product', 'AdminController@addproduct')->name('admin.product');
Route::get('/admin/manage-product', 'AdminController@manageproduct')->name('admin.manage.product');
Route::get('/admin/manage-orders', 'AdminController@manageorder')->name('admin.manage.order');

Route::get('/admin/manage-feedbacks', 'AdminController@feedback')->name('admin.feedback');
Route::get('/admin/manage-users', 'AdminController@manageuser')->name('admin.manage.user');
Route::get('/admin/manage-admins', 'AdminController@manageadmin')->name('admin.manage.admin');
Route::get('/admin/manage-owner', 'AdminController@manageowner')->name('admin.manage.owner');
Route::get('/admin/manage-ads', 'AdminController@manageads')->name('admin.manage.ads');


Route::resource('/admin/category', 'CategoryController');
Route::resource('/admin/sub-category', 'SubCategoryController');
Route::resource('/admin/products', 'ProductController');
Route::resource('/admin/orders', 'CheckoutController');
Route::resource('/users', 'UserController');
Route::resource('/admins', 'AdminController');
Route::resource('/user-history', 'UserhistoryController');
Route::resource('/owner-detail', 'OwnerDetailController');
Route::resource('/ads', 'AdViewController');
Route::post('/users/change-status', 'UserController@changestatus');




Route::get('/history/clear', function(){
    $histories = Userhistory::where('user_id', auth::user()->id)->orderBy('created_at', 'asc')->get();
    foreach($histories as $history){
        $history->delete();
    }

    return redirect('/my-history')->with('success', 'History Cleared!');
});

Route::get('/wishlist/clear', function(){
    $wishlists = Wishlist::where('user_id', auth::user()->id)->orderBy('created_at', 'asc')->get();
    foreach($wishlists as $wishlist){
        $wishlist->delete();
    }

    return redirect('/wishlist')->with('success', 'Wishlist Cleared!');
});


