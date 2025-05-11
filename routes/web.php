<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;


Route::get('/', [BookController::class, 'index'])->name('books.index');

Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

Route::get('/books/{id}', [BookController::class, 'show']);

Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');


Route::post('/books', [BookController::class, 'store'])->name('books.store');

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
