<?php

use App\Http\Controllers\EditorController;
use App\Http\Livewire\Cms\AddArticle;
use App\Http\Livewire\Cms\Article;
use App\Http\Livewire\Cms\Category\AddArticleCategory;
use App\Http\Livewire\Cms\Dashboard;
use Illuminate\Support\Facades\Route;

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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('web.cms')->group(function () {
    Route::post('/upload', [EditorController::class, 'uploadimage'])->name('ckeditor.upload');

    Route::get('/', Dashboard::class)->name('cms.dashboard');
    Route::get('/articles', Article::class)->name('cms.article');
    Route::get('/add-article/{id}', AddArticle::class)->name('cms.add-article');
    Route::get('/add-article-category', AddArticleCategory::class)->name('cms.add-article-category');
});
