<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\StaticController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [StaticController::class, 'index'])->name('main');

// Route::get('/hello/some/some', function () {
//     return 'Hello world';
// });

// Route::get('/about', function () {
//     return view('static/about');
// });

// Route::get('/about', [StaticController::class, 'about']);

Route::get('/post/{id}/{second}', function ($id, $second) {
    return "ID post: <h1>$id</h1>. Second: $second";
});

Route::get('/article/add', [ArticlesController::class, 'create']);
Route::post('/article/add', [ArticlesController::class, 'store']);

Route::get('/article/{id}/edit', [ArticlesController::class, 'edit']);
Route::put('/article/{id}/edit', [ArticlesController::class, 'update']);

// Route::resource('/article', ArticlesController::class);  //  автоматично відслідковує всі методи в контроллері
Route::get('/article/{id}', [ArticlesController::class, 'show'])->name('show');
// ->breadcrumbs(function ($trail) {
//     return $trail->parents('main');
// });
Route::get('/article/{id}/delete', [ArticlesController::class, 'destroy'])->name('delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
