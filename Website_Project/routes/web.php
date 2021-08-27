<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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
//Using routing Tutorial       #1

/*Route::get('/', function () {
  return view('welcome');
    return "Hello world";
});*/

/* parsing the data of the controller */
Route::get('/', 'App\Http\Controllers\PagesController@index');
Route::get('/Services', 'App\Http\Controllers\PagesController@Services');
Route::get('/About', 'App\Http\Controllers\PagesController@About');
Route::get('/Products', 'App\Http\Controllers\PagesController@Products');
  
/*
//creating pages on the terminal
Route::get('/hello', function () {
    //return view('welcome');
    return "<h1>Hello world</h1>";
});

//creating pages
Route::get('/Home', function () {
   return view('pages.Home');
});

   //submit pr passing dynamic request
   Route::get('/db/{id}', function ($id) {
    return "This is a users "  . $id;
     
});

//Using Controller Tutorial       #2 */



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
