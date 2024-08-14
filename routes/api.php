<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\IdeaController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Idea routes
Route::get('/ideas', [IdeaController::class, 'index']);
Route::get('/ideas/{id}', [IdeaController::class, 'show']);
Route::post('/ideas/create', [IdeaController::class, 'store']);
Route::put('/ideas/{id}', [IdeaController::class, 'update']);
Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy']);
Route::get('/ideas/search/{search?}', [IdeaController::class, 'search']);

// Post routes
Route::get('/posts', [PostController::class, 'getAllPosts']);
Route::get('/posts/{id}', [PostController::class, 'getSinglePost']);
Route::post('/posts/create', [PostController::class, 'createPost']);
Route::put('/posts/{id}', [PostController::class, 'updatePost']);
Route::delete('/posts/{id}', [PostController::class, 'deletePost']);

// Authentication
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
