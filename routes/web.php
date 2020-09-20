<?php
use RealRashid\SweetAlert\Facades\Alert;

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

// login
Auth::routes();

    Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
    Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');

    Route::post('/login/admin', 'Auth\LoginController@adminLogin');
    Route::post('/register/admin', 'Auth\RegisterController@createAdmin');

// home
Route::view('/home', 'home')->middleware('auth');
    Route::view('/index', 'DashboardController@index');
    Route::get('/', 'ProductController@index')->name('/');
    Route::resource('/product', 'ProductController');
    Route::resource('/home', 'HomeController');

// user
    Route::resource('/user', 'UserController');
// cart
    Route::resource('/cart', 'CartController');
    Route::resource('/transaction', 'TransactionController');
// admin
Route::group(['middleware' => ['auth:admin']],function(){
    Route::get('index', 'DashboardController@index')->name('index');
    Route::resource('/brand', 'BrandController');
    Route::resource('/phone', 'PhoneController');
    Route::resource('/galleries', 'GalleriesController');
    Route::get('/createphoto/{id}', 'GalleriesController@createphoto')->name('gallerie.create');
});

// public function FunctionName($value='')
// {
//     Cart::add(['id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 9.99, 'weight' => 550, 'options' => ['size' => 'large']]);
// }