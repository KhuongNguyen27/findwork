<?php

use Illuminate\Support\Facades\Route;
use Modules\AdminPost\app\Http\Controllers\AdminPostController;

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
    'prefix' => 'admin',
    'middleware' => ['auth','auth.admin']
], function () {
    Route::get('cv/{id}', [AdminPostController::class, 'showCV'])->name('cv.show');
    Route::resource('adminpost', AdminPostController::class)->names('adminpost');
});