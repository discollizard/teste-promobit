<?php

use App\Http\Controllers\{DashboardController, ProductController, TagController};
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    //dashboard e navegação
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/create-product', [DashboardController::class, 'createProductPage']);
    Route::get('/edit-product/{product_id}', [DashboardController::class, 'editProductPage']);


    Route::get('/see-tags', [DashboardController::class, 'seeTagsPage'])->name('tag_dashboard');
    Route::get('/create-tag', [DashboardController::class, 'createTagPage']);
    Route::get('/edit-tag/{tag_id}', [DashboardController::class, 'editTagPage']);

    //ver relatório
    Route::get('/report', [DashboardController::class, 'generateRelevanceReport']);

    //produtos
    Route::post('/save-product', [ProductController::class, 'saveProduct']);
    Route::post('/update-product', [ProductController::class, 'updateProduct']);
    Route::get('/delete-product/{product_id}', [ProductController::class, 'deleteProduct']);

    //tags
    Route::post('/save-tag', [TagController::class, 'saveTag']);
    Route::post('/update-tag', [TagController::class, 'updateTag']);
    Route::get('/delete-tag/{tag_id}', [TagController::class, 'deleteTag']);

});
