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
Route::get('/idea/{id}', [IdeaController::class, 'show']);
Route::post('/idea/create', [IdeaController::class, 'store']);
Route::put('/idea/{id}', [IdeaController::class, 'update']);
Route::delete('/idea/{id}', [IdeaController::class, 'destroy']);

// Post routes
Route::get('/posts', [PostController::class, 'getAllPosts']);
Route::get('/post/{id}', [PostController::class, 'getSinglePost']);
Route::post('/post/create', [PostController::class, 'createPost']);
Route::put('/post/{id}', [PostController::class, 'updatePost']);

// Authentication
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
