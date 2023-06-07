<?php

use App\Http\Controllers\frontend\aboutController;
use App\Http\Controllers\frontend\afcianController;
use App\Http\Controllers\frontend\contactController;
use App\Http\Controllers\frontend\galleryController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//frontend
use App\Http\Controllers\frontend\homeController;
use App\Http\Controllers\frontend\latestmovieController;
use App\Http\Controllers\frontend\noticeController;
use App\Http\Controllers\frontend\recruitmentController;
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

//Home
Route::get('/', [homeController ::class, 'index'])->name('home');
//About
Route::get('/about', [aboutController ::class, 'index'])->name('about');
//Gallery
Route::get('/gallery', [galleryController ::class, 'index'])->name('gallery');
//Afcian
Route::get('/afcian', [afcianController ::class, 'index'])->name('afcian');
//Contact
Route::get('/contact', [contactController ::class, 'index'])->name('contact');
Route::post('/contact/submit', [contactController ::class, 'submit'])->name('contact.submit');

//Latest Movies
Route::get('/latest-movies',[latestmovieController ::class, 'index'])->name('latest.movies');
//Notice
Route::get('/latest-news', [noticeController ::class, 'index'])->name('notice');
Route::get('/latest-news/{slag}', [noticeController ::class, 'view'])->name('notice.view');

//New Apply
Route::get('/apply', [recruitmentController ::class, 'index'])->name('apply.view');
Route::post('/apply/submit', [recruitmentController ::class, 'postApplication'])->name('post.apply.form');
Route::get('/alrady/applied', [recruitmentController ::class, 'alrady_applied'])->name('alrady.applied');
Route::post('/alrady/applied/find', [recruitmentController ::class, 'alrady_applied_post'])->name('alrady.applied.find');
Route::get('/success/{id}', [recruitmentController ::class, 'postApplicationsuccess'])->name('apply.success');
Route::get('/download/{id}', [recruitmentController ::class, 'downloadApplicationsuccess'])->name('apply.download');

//User Auth routes
Auth::routes();

//command
Route::get('/c', function () { \Artisan::call('migrate'); });
Route::get('/optimize', function () { \Artisan::call('optimize:clear'); });
Route::get('/controller', function () { \Artisan::call('make:controller backend/recruitmentController -r'); });

