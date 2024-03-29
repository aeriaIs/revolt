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

use App\Product;
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@index');

Route::get('/createproduct', function () {
    $post = Product::create([
        'category' => 'Shirt/Polo',
        'product_name' => 'Revolt Factory ',
        'product_detail' => 'This is t-shirt with best quality materials',
        'product_photo' => 'rvlt.jpg'
    ]);

    return "Data berhasil ditambah.";
});

Route::get('/showproduct', function () {
    $post = Product::all();

    return $post;
});

// Route::get('/asuraimucok', fucction () {
    
// });

Route::resource('/feedback', 'FeedbackController');
Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => '/6661/admin', 'middleware'=> 'auth'], function() {
    
    Route::resource('home', 'HomeController');

    Route::resource('feedback', 'adminController\FeedbackController')->only([
        'index', 'destroy'
    ]);

    Route::resource('profile', 'adminController\ProfileController')->only([
        'index', 'edit', 'update'
    ]);
    
    Route::resource('about-company', 'adminController\AboutCompanyController')->only([
        'index', 'edit', 'update'
    ]);
    
});
