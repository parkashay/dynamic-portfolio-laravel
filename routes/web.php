<?php

use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/auth', [AdminPageController::class, 'auth']);
Route::get('/dashboard', [AdminPageController::class, 'index']);
Route::post('/adminform', [AdminPageController::class, 'newContent']);
Route::post('/verify', [AdminPageController::class, 'verify']);
Route::get('/delete/{id}',[AdminPageController::class, 'delete']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::post('/addproject', [ProjectController::class, 'create']);
Route::get('projectdelete/{id}', [ProjectController::class, 'delete']);