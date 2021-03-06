<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\CommentsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('users', UsersController::class);
Route::apiResource('todos', TodosController::class);
Route::apiResource('albums', AlbumsController::class);
Route::apiResource('photos', PhotosController::class);
Route::apiResource('posts', PostsController::class);
Route::apiResource('comments', CommentsController::class);