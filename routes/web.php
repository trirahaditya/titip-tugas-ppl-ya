<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;

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

// Route::get('/', [App\Http\Controllers\FileUploadController::class, 'index'])->name('fileupload.store');
// Route::get('/', [App\Http\Controllers\FileUploadController::class, 'index']);
// Route::resource('images', 'App\Http\Controllers\FileUploadController', ['only' => ['store', 'destroy']]);

Route::get('/', [ FileUploadController::class, 'index' ])->name('index');
Route::get('/create', [ FileUploadController::class, 'imageUpload' ])->name('image.upload');
Route::post('image-upload', [ FileUploadController::class, 'imageUploadPost' ])->name('image.upload.post');
Route::post('image-delete-{id}', [ FileUploadController::class, 'imageDelete' ])->name('image.delete');
Route::get('image-download-{id}', [ FileUploadController::class, 'imageDownload' ])->name('image.download');


