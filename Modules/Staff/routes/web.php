<?php

use Illuminate\Support\Facades\Route;
use Modules\Staff\app\Http\Controllers\ProfileController;
use Modules\Staff\app\Http\Controllers\AuthController;
use Modules\Staff\app\Http\Controllers\UserCvController;
use Modules\Staff\app\Http\Controllers\CvsExampleController;
use Modules\Staff\app\Http\Controllers\UserExperienceController;
use Modules\Staff\app\Http\Controllers\UserEducationController;
use Modules\Staff\app\Http\Controllers\UserSkillController;
use Modules\Staff\app\Http\Controllers\UserJobAppliedController;
use Modules\Staff\app\Http\Controllers\UserJobFavoriteController;
use App\Http\Controllers\PageController;

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

Route::group([
    'prefix' => 'staff',
	'middleware' => ['auth.staff'],
    'as' => 'staff.'
], function () {
    Route::get('/', [ProfileController::class, 'index'])->name('home1');
    // Route::get('/', function () {
    //     return view('staff::index1');
    // })->name('home');
    Route::get('/',[ProfileController::class,'dashboard'])->name('home');
    Route::get('job-favorite',[UserJobFavoriteController::class,'index'])->name('favorite');
    Route::get('job-favorite/{id}',[UserJobFavoriteController::class,'job_favorite'])->name('job-favorite');
    Route::delete('job-favorite/{id}',[UserJobFavoriteController::class,'destroy'])->name('job-favorite.destroy');
        
    Route::get('job-applied',[UserJobAppliedController::class,'index'])->name('job-applied');
    Route::delete('job-applied/{id}',[UserJobAppliedController::class,'destroy'])->name('job-applied.destroy');

    Route::get('/profile/editpassword', [ProfileController::class,'editpassword'])->name('profile.editpassword');
	Route::post('/change-password/{id}', [ProfileController::class,'changePassword'])->name('profile.changePassword');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('update');
    Route::resource('profile', ProfileController::class)->names('profile');
    Route::post('/uploadCV',[UserCvController::class,'uploadCV'])->name('uploadCV');
    
    Route::resource('cv', UserCvController::class)->names('cv');
    Route::resource('experience', UserExperienceController::class)->names('experience');
    Route::resource('education', UserEducationController::class)->names('education');
    Route::resource('skill', UserSkillController::class)->names('skill');
    });
    Route::get('cv/download/{id}',[UserCvController::class,'download'])->name('cv.download');
Route::group([
    'prefix' => 'staff',
    'as' => 'staff.'
], function () {
    Route::get('login',[AuthController::class,'login'])->name('login');
    Route::post('postLogin',[AuthController::class,'postLogin'])->name('postLogin');
    // Register
    Route::get('register',[AuthController::class,'register'])->name('register');
    Route::post('postRegister',[AuthController::class,'postRegister'])->name('postRegister');

    Route::get('/verification/{email}',[AuthController::class,'verification'])->name('verification');
    Route::post('/confirm', [AuthController::class, 'confirm'])->name('confirm');
    Route::post('resend', [AuthController::class, 'resend'])->name('resend');


});

Route::get('redirectToFacebook',[AuthController::class,'redirectToFacebook'])->name('login.facebook');
Route::get('handleFacebookCallback',[AuthController::class,'handleFacebookCallback']);

Route::get('redirectToGoogle',[AuthController::class,'redirectToGoogle'])->name('login.goole');
Route::get('handleGoogleCallback',[AuthController::class,'handleGoogleCallback']);

// Bỏ qua chờ làm phần nâng cao
// Route::group([
//     'prefix' => 'cvs_example',
// ], function () {
//     Route::resource('cvs', CvsExampleController::class)->names('cvs');
// });

Route::get('/{slug}', [PageController::class,'show'])->name('pages.show');
