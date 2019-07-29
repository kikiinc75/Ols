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

// Route::get('/', function () {
//     return view('templates.template2.index');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home'); //localhost:8000/home
Route::get('/products', 'HomeController@product')->name('product'); //localhost:8000/product
Route::get('/products/{id}', 'HomeController@detail')->name('product'); ////localhost:8000/product/1
Route::get('/page/{id}', 'HomeController@page')->name('page'); //localhost:8000/page/1
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/aboutus', 'HomeController@aboutus')->name('aboutus');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/cart', 'CartController@index')->name("cart"); //locolhost:8000/cart
Route::get('/cart/{id}/keranjang', 'CartController@keranjang'); //localhost:8000/cart/1/create
Route::post('/cart/store', 'CartController@store');
Route::get('/cart/{id}/destroy', 'CartController@destroy');
Route::post('/cart/ubahqty', 'CartController@ubahqty');
Route::post('/databelanja/tambahdatabelanja', 'CartController@tambahdatabelanja');
Route::get('/cart/data', 'CartController@data');
Route::get('/cart/data/terimakasih', 'CartController@dataterimakasih');
Route::get('/product/{id}/store', 'WishlishController@store');

Route::get('/status', 'StatusController@index')->name('status');
Route::post('/status/upload', 'StatusController@upload')->name('upload');
Route::get('/status/{id}/hapus', 'StatusController@hapus')->name('hapus');
Route::post('/status/{id}/edit', 'StatusController@edit')->name('edit');
Route::patch('/status/{id}/diterima', 'StatusController@diterima')->name('diterima');



Route::get('/checkout', 'CheckoutController@checkout')->middleware('auth');



Route::get('/data', function () {
    return App\Template::all();
});
// GROUP DASHBOARD 
    Route::prefix('dashboard')->group(function () {
    Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard_home');
    Route::get('/home', 'Dashboard\DashboardController@index')->name('dashboard_home2');
    Route::get('/notif', 'Dashboard\DashboardController@index')->name('dashboard_notif');
    Route::get('/notif/readall', 'Dashboard\DashboardController@readall')->name('dashboard_readall');
    Route::get('/readpage', 'Dashboard\DashboardController@notifpage');
    // CRUD ROUTE
    Route::resource('categorie', 'Dashboard\CategorieController');
    Route::resource('product', 'Dashboard\ProductController');
    Route::resource('page', 'Dashboard\PageController');

    Route::get('/sale', 'Dashboard\SaleController@index');
    Route::get('/sale/{id}/edit', 'Dashboard\SaleController@edit');
    Route::post('/sale/{id}/update', 'Dashboard\SaleController@update');
    Route::get('/sale/{id}/detail', 'Dashboard\SaleController@detail');
    Route::get('/sale/{id}/destroy', 'Dashboard\SaleController@destroy');
    Route::get('/sale/{id}/print', 'Dashboard\SaleController@print');
    Route::post('/sale/cari', 'Dashboard\SaleController@cari');
 
    Route::resource('vouchers', 'Dashboard\VouchersController');
    /*template*/
    Route::get("template", "Dashboard\TemplateController@index")->name('list.template');
    Route::get("template/{id}/select", "Dashboard\TemplateController@select")->name("template.select"); //localhost:8000/template/1/select
});
    Route::prefix('api')->group(function () {
    Route::post('cart', 'API\CartController@store')->name('api.cart.store');
    Route::get('cart', 'API\CartController@index')->name('api.cart.index');
    Route::delete('cart/{id}', 'API\CartController@destroy')->name('api.cart.destroy');
});
