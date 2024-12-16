<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Middleware\countrymiddleware;
use App\Http\Middleware\CraditMiddleware;
use App\Http\Middleware\SimpleMiddleware;



use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/public', [SiteController::class, 'public']);
// Route::get('/private', [SiteController::class, 'private'])->middleware(['auth']);
// Route::get('/secret', [SiteController::class, 'secret'])->middleware(['auth']);

// Route::middleware(['auth'])->group(function () {
//     Route::get('/private', [SiteController::class, 'private']);
//     Route::get('/secret', [SiteController::class, 'secret']);
// });


Route::middleware(['auth', 'throttle:2,1'])->group(function () {
    Route::get('/private', [SiteController::class, 'private']);
    Route::get('/secret', [SiteController::class, 'secret']);
});


Route::get('/download', [SiteController::class, 'FileDownload'])->middleware(['throttle:2,1']);

Route::get('/massage',[SiteController::class, 'massage'])->middleware([SimpleMiddleware::class]);

Route::get('/bd',[SiteController::class, 'content'])->middleware([countrymiddleware::class]);

Route::get('/upload'    ,[SiteController::class, 'upload']);