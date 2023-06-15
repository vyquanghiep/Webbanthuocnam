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

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
//user
Route::get('/', 'HomeController@index');
Route::get('/trang-chu', 'HomeController@index');
Route::get('/danh-muc-san-pham/{categoryid}', 'CategoryProduct@show_category_home');
Route::get('/chi-tiet-san-pham/{bookid}', 'ProductController@details_product');
Route::get('/chi-tiet-san-pham2/{bookid}', 'ProductController@details_product2');
Route::post('/change_password', 'HomeController@changedPassword');
Route::get('/product_hot', 'ProductController@producthot_home');
Route::get('/product_new', 'ProductController@productnew_home');
Route::get('/product_vip', 'ProductController@productvip_home');
//post-menu
Route::get('/bai-dang', 'PostController@index2');
Route::get('/lien-he', 'PostController@index4');
Route::get('/about-us', 'PostController@index3');
Route::get('/chi-tiet-post/{bookid}', 'PostController@details_post');

//cart
Route::post('/save-cart', 'CartController@save_cart');
Route::get('/show-cart', 'CartController@show_cart');
Route::get('/delete-to-cart/{rowId}', 'CartController@delete_to_cart');
Route::post('/update-cart-quantity', 'CartController@update_cart_quantity');
Route::post('/login-cart', 'CartController@login_cart');
Route::post('/signin-cart', 'CartController@signin_cart');

//checkout
Route::post('/payment', 'CheckoutController@payment');
//Profile + Ordered
Route::get('/show-profile', 'ProfileController@show_profile');
Route::get('/show-details-ordered/{orderid}', 'ProfileController@show_details_ordered');
Route::post('/load-comment', 'ProfileController@load_comment');
Route::post('/send-comment', 'ProfileController@send_comment');
Route::post('/update-profile', 'ProfileController@update_profile');

//login
Route::post('/dangky', 'HomeController@postDangKy');
Route::post('/dangnhap', 'HomeController@postDangNhap');
Route::get('/dangxuat', 'HomeController@getDangXuat');

// search
Route:: get('/search', 'SearchController@show_search_results');
Route:: post('/get_suggestion', 'SearchController@show_suggestion');




// BEGIN ADMIN
// admin dashboard

Route::get('/admin', 'AdminController@index');
Route::get('/show_dashboard', 'AdminController@showDashBoard');
Route::post('/admin_dashboard','AdminController@dashboard'); 
Route::get('/logout', 'AdminController@logout');
//Program Files

//Profile
Route::get('/show-profile2', 'ProfileController@show_profile2');
Route::post('/update-profile2', 'ProfileController@update_profile2');
// product
Route::get('/show_SPs', 'ProductController@show_all_SPs');
Route::get('/show_add_SPs', 'ProductController@show_add_SPs');
Route::post('/save_product', 'ProductController@save_product');
Route::post('/save_product2', 'ProductController@save_product2');
Route::get('/delete_SP/{bookid}', 'ProductController@delete_SP');
Route::get('/edit_SP/{bookid}', 'ProductController@edit_SP');
Route::post('/update_SP/{bookid}', 'ProductController@update_SP');


// admin category
Route::get('/add_category', 'CategoryProduct@show_form_add_category');
Route::get('/all_category', 'CategoryProduct@show_all_category');
Route::post('/save_category', 'CategoryProduct@add_category');
Route::get('/delete_category/{categoryid}', 'CategoryProduct@delete_category');
Route::get('/update_category/{categoryid}', 'CategoryProduct@show_form_edit_category');
Route::post('/save_editcategory', 'CategoryProduct@update_category');


// ncc
Route::get('/show_nccs', 'NccController@show_all_nccs');
Route::get('/show_add_nccs', 'NccController@show_add_nccs');
Route::post('/save_ncc', 'NccController@save_ncc');
Route::get('/delete_ncc/{nccid}', 'NccController@delete_ncc');
Route::get('/edit_ncc/{nccid}', 'NccController@edit_ncc');
Route::post('/update_ncc/{nccid}', 'NccController@update_ncc');

// admin type
Route::get('/all_nxb', 'TypeSPController@show_all_Type');
Route::get('/add_nxb', 'TypeSPController@show_form_add_Type');
Route::get('/delete_nxb/{maloai}', 'TypeSPController@delete_Type');
Route::post('/save_nxb', 'TypeSPController@add_Type');
Route::get('/update_nxb/{maloai}', 'TypeSPController@show_form_edit_Type');
Route::post('/save_editnxb', 'TypeSPController@update_Type');



// admin users
Route::get('/all_users', 'UsersController@show_all_users');
Route::get('/show_add_users', 'UsersController@show_add_users');
Route::post('/save_users', 'UsersController@save_user');
Route::post('/reload_users', 'UsersController@get_all_users');
Route::post('/admin_enable', 'UsersController@enableAdmin');
Route::post('/admin_disable', 'UsersController@disableAdmin');
Route::post('/user_disable', 'UserssController@disableUser');
Route::post('/user_enable', 'UsersController@enableUser');
Route::post('/remove_user', 'UsersController@remove_user');


// admin orders
Route::get('/print_order/{id}', 'OrderController@print_order');
Route::get('/all_orders', 'OrderController@show_all_orders');
Route::get('/order_detail/{id}', 'OrderController@show_order_details');

Route::post('/order_confirm', 'OrderController@confirm_order');
Route::post('/order_fail', 'OrderController@fail_order');
Route::post('/order_success', 'OrderController@success_order');
Route::post('/order_delete', 'OrderController@delete_order');
Route::get('/order_filter', 'OrderController@filter_orders');


// END ADMIN





