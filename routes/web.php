<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\RenewController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\SearchController;

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

Route::get('/setup', [RedirectController::class, 'redirectToSetupPage']);

Route::post('/setup/process', [SetupController::class, 'setup']);

Route::get('/renew', [RedirectController::class, 'redirectToRenewPage']);

Route::post('/renew/process', [RenewController::class, 'renew']);

Route::get('browse', [BrowseController::class, 'browse']);

Route::get('/search', [SearchController::class, 'search']);