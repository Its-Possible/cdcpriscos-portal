<?php

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

Route::get('/', [\App\Http\Controllers\View\PageViewController::class, 'home'])->name('cdc.index');
Route::get('/home', [\App\Http\Controllers\View\PageViewController::class, 'home'])->name('cdc.home');
Route::get('/auth/sign-in', [\App\Http\Controllers\View\PageViewController::class, 'signIn'])->name('cdc.sign-in');
Route::post('/auth/login', [\App\Http\Controllers\View\PageViewController::class, 'login'])->name('cdc.login');
