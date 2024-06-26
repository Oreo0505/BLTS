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
use App\Http\Controllers\FetchController;
use App\Http\Controllers\RestoreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [RedirectController::class, 'redirectToHome']);

Route::get('/homepage', [RedirectController::class, 'redirectToHomepage']);

Route::post('/upload', [CreateController::class, 'createDocument']);

Route::post('/delete', [DeleteController::class, 'delete']);

Route::post('/update', [UpdateController::class, 'updateDocument']);

Route::post('/update/logo', [UpdateController::class, 'updateLogo']);

Route::post('/update/logo/admin', [UpdateController::class, 'updateLogoAdmin']);

Route::get('/download/{file_name}', [DownloadController::class, 'download']);

Route::get('/setup', [RedirectController::class, 'redirectToSetupPage']);

Route::post('/setup/process', [SetupController::class, 'setup']);

Route::get('/renew', [RedirectController::class, 'redirectToRenewPage']);

Route::post('/renew/process', [RenewController::class, 'renew']);

Route::get('browse', [BrowseController::class, 'browse']);

Route::get('/search', [SearchController::class, 'search']);

Route::get('/get/document', [FetchController::class, 'getDocument']);

Route::get('/get/author', [FetchController::class, 'getAuthors']);

Route::get('/get/term', [FetchController::class, 'getTerm']);

Route::get('/profile', [RedirectController::class, 'redirectToProfilePage']);

Route::post('/profile/update', [UpdateController::class, 'updateProfile']);

Route::get('/profile/add', [RedirectController::class, 'redirectToAddProfilePage']);

Route::post('/profile/add/process', [CreateController::class, 'createTerm']);

Route::get('/trash', [RedirectController::class, 'redirectToTrashPage']);

Route::post('/restore', [RestoreController::class, 'restore']);

Route::get('/about', [RedirectController::class, 'redirectToAboutPage']);

Route::get('/about/admin', [RedirectController::class, 'redirectToAboutAdminPage']);

Route::get('/home', [RedirectController::class, 'redirectToHome']);

Route::get('/login', [RedirectController::class, 'redirectToLoginPage']);

Route::post('/login/process', [LoginController::class, 'loginUser']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/admin', [RedirectController::class, 'redirectToLoginAdmin']);

Route::post('/login/process/admin', [LoginController::class, 'loginAdmin']);

Route::get('/admin/municipal', [RedirectController::class, 'redirectToMunicipalAdmin']);

Route::get('/get/documents', [FetchController::class, 'getBarangayStatistics']);

// Route::get('/user/count/list', FetchController::class, 'getUserCountList');

Route::get('/admin/municipal/users/list', [RedirectController::class, 'redirectToUsersListPage']);

Route::get('/admin/municipal/profile', [RedirectController::class, 'redirectToAdminMunicipalProfilePage']);

// Route::get('admin/municipal/profile', [UserController::class, 'adminMunicipalProfile']);

Route::get('/get/users/list/table',[FetchController::class, 'getUsersListTable']);

Route::get('/forgot/password', [RedirectController::class, 'redirectToForgotPasswordPage']);

Route::post('/forgot/password/process', [FetchController::class, 'getForgotPassword']);

Route::post('/admin/municipal/profile/update', [UpdateController::class, 'updateAdminMunicipalProfile']);

Route::get('/admin/forgot/password', [RedirectController::class, 'redirectToAdminForgotPasswordPage']);

Route::post('/admin/forgot/password/process', [LoginController::class, 'getAdminForgotPassword']);
