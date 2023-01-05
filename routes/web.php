<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use Symfony\Contracts\Service\Attribute\Required;

// use illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|s
*/

//show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');


// All Listings
Route::get('/', [ListingController::class, 'index']);







//Store Listing Data
Route::post('/listings',[ListingController::class, 'store'])->middleware('auth');

//Show Listing Data
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Update listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');
//Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//Single Listing

Route::get('/listings/{listing}', [ListingController::class, 'show']
   
    // $listing =  Listing::find($id);
    // if($listing){
    //     return view('listing',[
    //         'listing' => $listing
    //     ]);

    // }else{
    //     abort('404');
    // }
    
    
);

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout',[UserController::class, 'logout'])->middleware('auth');

//Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);





// Route::get('/hello', function(){
//     return response('<h1>Hello World</h1>', 200)
//     ->header('Content-Type', 'text/plain')
//     ->header('foo', 'bar');
// });
// Route::get('/posts/{id}', function($id){
//     return response('Post' . $id);
// })->where('id', '[0-9]+');
// Route::get('/search', function(Request $request){
//    return $request->name . ' '. $request->city;
// });
