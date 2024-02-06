<?php

use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/supports/create', [SupportController::class, 'create'])
    ->name('supports.create');

Route::post('/supports/store', [
    SupportController::class, 'store'])
    ->name('supports.store');

Route::get('/supports/{support}', [SupportController::class, 'show'])
    ->name('supports.show');

Route::get('/supports/{support}/edit', [SupportController::class, 'edit'])
    ->name('supports.edit');

Route::put('/supports/update/{id}', [SupportController::class, 'update'])
    ->name('supports.update');

Route::get('/supports', [SupportController::class, 'index'])
    ->name('supports.index');

Route::delete('/supports/{id}', [SupportController::class, 'destroy'])
    ->name('supports.destroy');

Route::get('/contact', [SiteController::class, 'contact']);

Route::get('/', function () {
    return view('welcome');
});
