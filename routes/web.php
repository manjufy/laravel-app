<?php

use App\Http\Controllers\ListingController;
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

// Common Resource Routes:
// index - Show all
// show - show single
// create - Show form to create new {resource}
// store - Store new listing
// edit - Show form to edit {resource}
// update - Update resource
// destroy - Deleting resource

// Listings
Route::get('/', [ListingController::class, 'index']);
Route::get('listings/{listing}', [ListingController::class, 'show']);

// miscellaneous
Route::get('/posts', function () {
  return view('posts', [ 'posts' => Post::all()]);
});

Route::get('posts/{post}', function ($slug) {
  return view('post', ['post' => Post::find($slug)]);
})->where('post', '[A-z_\-]+');
 
Route::get('search', function(Request $request) {
  $queries = $request->query;

  return print_r($queries, true);
});
