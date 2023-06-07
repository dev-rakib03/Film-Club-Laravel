<?php

use App\Http\Controllers\backend\aboutController;
use Illuminate\Support\Facades\Route;

//admin
use App\Http\Controllers\backend\Auth\ForgotPasswordController;
use App\Http\Controllers\backend\Auth\LoginController;
use App\Http\Controllers\backend\adminsController;
use App\Http\Controllers\backend\afcianController;
use App\Http\Controllers\backend\contactController;
use App\Http\Controllers\backend\dashboardController;
use App\Http\Controllers\backend\galleryController;
use App\Http\Controllers\backend\latestmoviesController;
use App\Http\Controllers\backend\noticeController;
use App\Http\Controllers\backend\rolesController;
use App\Http\Controllers\backend\usersController;
use App\Http\Controllers\backend\settingsController;
use App\Http\Controllers\backend\socialController;
use App\Http\Controllers\backend\recruitmentController;
use App\Http\Controllers\backend\page\adminhomeController;




/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/



// Admin Login Routes
Route::get('login', [LoginController::class,'showLoginForm'])->name('admin.login');
Route::post('login/submit', [LoginController::class,'login'])->name('admin.login.submit');

// Admin Forget Password Routes
Route::get('password/reset', [ForgotPasswordController ::class,'showLinkRequestForm'])->name('admin.password.request');
Route::post('password/reset/submit', [ForgotPasswordController ::class,'reset'])->name('admin.password.update');



//Dashboard
Route::get('dashboard', [dashboardController::class, 'index'])->name('admin.dashboard');
//role
Route::resource('roles',rolesController::class, ['names' => 'admin.roles']);
//users
Route::resource('users',usersController::class, ['names' => 'admin.users']);
//admin
Route::resource('admins',adminsController::class, ['names' => 'admin.admins']);
//Pages
    //Home
Route::resource('pages/home',adminhomeController::class, ['names' => 'admin.pages.home']);
Route::post('pages/success/massage', [adminhomeController ::class, 'success_massage'])->name('admin.success.massage');
    //About
Route::resource('pages/about', aboutController::class, ['names' =>'admin.pages.about']);
    //Gallery
Route::resource('pages/gallery', galleryController::class, ['names'=>'admin.pages.gallery']);
    //Latest Movies
Route::resource('pages/latest-movies', latestmoviesController::class,['names'=>'admin.pages.latest_movies']);
    //Notice
Route::resource('pages/notice', noticeController::class, ['names'=>'admin.pages.notice']);
    //Afcian
Route::resource('pages/afcian', afcianController::class, ['names'=>'admin.pages.afcian']);
    //Contact
Route::resource('pages/contact', contactController::class, ['names'=>'admin.pages.contact']);

//recruitmentController
Route::resource('recruitment',recruitmentController::class, ['names' => 'admin.recruitment']);
Route::get('settings/recruitment',[recruitmentController::class, 'settings'])->name('admin.recruitment.settings');
Route::get('settings/recruitment/{status}',[recruitmentController::class, 'application_form_btn'])->name('admin.recruitment.settings.app_status');

Route::get('/delete-all', [recruitmentController ::class, 'deleteApplicationsuccess'])->name('apply.delete');
Route::get('/send-email', [recruitmentController ::class, 'sendEmailToAllApplicent'])->name('apply.send.email');
Route::post('/send-email-post', [recruitmentController ::class, 'sendEmailToAllApplicentpost'])->name('apply.send.email.post');

//settings
Route::resource('settings/site',settingsController::class, ['names' => 'admin.settings.site']);

Route::post('settings/site/banner', [settingsController ::class,'topbanner'])->name('admin.settings.site.topbanner');

Route::resource('settings/social',socialController::class, ['names' => 'admin.settings.social']);
// Logout Routes
Route::post('/logout/submit', [LoginController::class,'logout'])->name('admin.logout.submit');


