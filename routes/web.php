<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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

Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');;

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');;
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');;

Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');;

Route::get('listings/{listing}', [ListingController::class, 'show']);

// Auth
Route::get('/register', [UserController::class, 'create'])->middleware('guest');;
Route::post('/users', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');;

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');;
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// miscellaneous
// Route::get('/posts', function () {
//   return view('posts', [ 'posts' => Post::all()]);
// });

// Route::get('posts/{post}', function ($slug) {
//   return view('post', ['post' => Post::find($slug)]);
// })->where('post', '[A-z_\-]+');
 
// Route::get('search', function(Request $request) {
//   $queries = $request->query;

//   return print_r($queries, true);
// });
