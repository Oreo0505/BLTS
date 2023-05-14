<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\UpdateController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RedirectController::class, 'redirectToHomepage']);

Route::post('/upload', [CreateController::class, 'create']);

Route::post('/delete', [DeleteController::class, 'delete']);

Route::get('/getData', [UpdateController::class, 'getData']);

Route::post('/update', [UpdateController::class, 'update']);

Route::get('/download/{file_name}', [DownloadController::class, 'download']);
