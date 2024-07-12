<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FilmController::class,'list'])->name("home");
Route::get('/insert', [FilmController::class,'insert'])->name("insert")->middleware('auth');
Route::post('/insert', [FilmController::class,'do_insert']);
Route::post('/delete', [FilmController::class, 'delete'])->name('delete');
Route::post('/delete_img', [FilmController::class, 'deleteImg'])->name('delete_img');
Route::post('/add_img/{id}', [FilmController::class, 'addImage'])->name('add_img');
Route::get('/edit/{id}', [FilmController::class,'edit'])->name("edit")->middleware('auth');
Route::post('/edit/{id}', [FilmController::class,'do_edit']);
Route::get('/info/{id}', [FilmController::class,'info'])->name("info");
Route::post('/comment/{id}', [FilmController::class, 'storeComment'])->name('comment.store');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/type', [TypeController::class,'list'])->name("typeHome");
Route::get('/type/insert', [TypeController::class,'insert'])->name("typeInsert")->middleware('auth');
Route::post('/type/insert', [TypeController::class,'do_insert']);
Route::post('/type/delete', [TypeController::class, 'delete'])->name('typeDelete');
Route::get('/type/edit/{id}', [TypeController::class,'edit'])->name("typeEdit")->middleware('auth');
Route::post('/type/edit/{id}', [TypeController::class,'do_edit']);

Route::get('/day1', function () {
    return view('day1');
});
