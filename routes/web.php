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

// Route::get('/', function ($value=''){
//   return view('welcome');
// });

// Frontend

Route::get('/', 'FirstController@index')->name('homepage');

Route::get('about', 'FirstController@about')->name('aboutpage');

Route::get('contact', 'FirstController@contact')->name('contactpage');

Route::get('orderhistory', 'FirstController@orderhistory')->name('orderhistorypage');

Route::get('filter/{id}', 'FirstController@filter')->name('filterpage');

Route::get('cart', 'FirstController@cart')->name('cartpage');

Route::resource('orders', 'OrderController');

// Backend
Route::middleware('role:admin')->group(function () {
  Route::get('dashboard', 'BackendController@dashboard')->name('dashboardpage');
  Route::resource('categories', 'CategoryController');
  Route::resource('subcategories', 'SubcategoryController');
});
// Auth
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
