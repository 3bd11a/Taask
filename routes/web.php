<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Exports\PostsExport;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts',[PostController::class, 'index'])->name('posts.index');
Route::post('/posts/import', [PostController::class, 'import'])->name('posts.import');
Route::get('import-posts', function () {
    return view('import');
});
Route::get('/test-api', [PostController::class, 'GetApi']);
Route::get('/test-api', [PostController::class, 'PostApi']);
Route::get('export-posts', [PostController::class, 'export'])->name('posts.export');
Route::get('export-posts', function () {
    return Excel::download(new PostsExport, 'posts.xlsx');
});

Route::get('export-posts', [PostController::class, 'exportPosts']);