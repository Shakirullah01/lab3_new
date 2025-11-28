<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;



# Homepage — show the list of movies
Route::get('/', [MovieController::class, 'index'])->name('movies.index');

# Resource routes for CRUD (index, create, store, show, edit, update, destroy)
Route::resource('movies', MovieController::class)->except(['index']);
