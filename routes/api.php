<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/page/{page}', [\App\Http\Controllers\Api\PageApiController::class, 'index'])->name('cdcapi.page.index');
Route::get('/slides', [\App\Http\Controllers\Api\SlideApiController::class, 'index'])->name('cdcapi.slides.index');
Route::get('/posts', [\App\Http\Controllers\Api\PostApiController::class, 'index'])->name('cdcapi.posts.index');
