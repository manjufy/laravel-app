<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Http\Request;

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
  return view('posts', [ 'posts' => Post::all()]);
});

Route::get('posts/{post}', function ($slug) {
  return view('post', ['post' => Post::find($slug)]);
})->where('post', '[A-z_\-]+');
 
Route::get('search', function(Request $request) {
  $queries = $request->query;

  return print_r($queries, true);
});

// Listings
Route::get('listings', function() {
  return view('listings', [
    'heading' => 'Job Listings',
    'listings' => Listing::all(),
  ]);
});

Route::get('listings/{id}', function($id) {
  return view('listing', [
    'heading' => 'Job',
    'data' => Listing::find($id),
  ]);
});