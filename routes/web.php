<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::resource('posts', 'App\Http\Controllers\PostController');

Route::get('/read', function () {
    $posts = Post::all();
    foreach ($posts as $p){
        echo "<pre>";
        print_r($p->category);
        echo "</pre>";
    }
    return false;
});

Route::get('/find/{cat}', function ($cat) {
    $posts = Post::where('category', $cat)->get();
    return view('posts.index', compact('posts'));
//    return $posts;
});

Route::get('/daterange', 'App\Http\Controllers\DateRangeController@index');
Route::post('/daterange/fetch_data', 'App\Http\Controllers\DateRangeController@fetch_data')->name('daterange.fetch_data');
