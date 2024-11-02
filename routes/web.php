<?php

use App\Http\Controllers\bookIssueController;
use App\Http\Controllers\booksController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('dashboard')->middleware(['auth:sanctum', 'verified'])->group(function () {
        Route::get('/', [homeController::class, 'index'])->name('dashboard');

        //books
        Route::prefix('books')->group(function () {
            Route::get('/add', [booksController::class, 'create'])->name('admin.add.books');
            Route::post('/store/{id?}', [booksController::class, 'store'])->name('admin.store.books');
            Route::get('/list', [booksController::class, 'index'])->name('admin.list.books');
            Route::get('/edit/{id}', [booksController::class, 'edit'])->name('admin.edit.books');
            Route::get('/delete/{id}', [booksController::class, 'destroy'])->name('admin.delete.books');
        });
        Route::prefix('student')->group(function () {
            Route::get('/add', [studentController::class, 'create'])->name('admin.add.student');
            Route::post('/store/{id?}', [studentController::class, 'store'])->name('admin.store.student');
            Route::get('/list', [studentController::class, 'index'])->name('admin.list.student');
            Route::get('/edit/{id}', [studentController::class, 'edit'])->name('admin.edit.student');
            Route::get('/delete/{id}', [studentController::class, 'destroy'])->name('admin.delete.student');
        });
        Route::prefix('book-issue')->group(function () {
            Route::get('/add', [bookIssueController::class, 'create'])->name('admin.add.book-issue');
            Route::post('/store/{id?}', [bookIssueController::class, 'store'])->name('admin.store.book-issue');
            Route::get('/list', [bookIssueController::class, 'index'])->name('admin.list.book-issue');
            Route::get('/edit/{id}', [bookIssueController::class, 'edit'])->name('admin.edit.book-issue');
            Route::get('/delete/{id}', [bookIssueController::class, 'destroy'])->name('admin.delete.book-issue');
        });
    });
});
