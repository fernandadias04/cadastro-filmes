<?php

use App\Http\Controllers\MovieController;
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

Route::redirect('/', '/movies')->name('home');

Route::middleware(['auth'])
    ->prefix('movies')
    ->as('movies.')
    ->group(function() {

        Route::get('/', [MovieController::class, 'index'])->name('index');
        Route::get('/edit', [MovieController::class, 'edit'])->name('edit');
        Route::post('/edit', [MovieController::class, 'update'])->name('update');
        Route::get('/create', [MovieController::class, 'create'])->name('create');
        Route::post('/create', [MovieController::class, 'update'])->name('update');
        Route::delete('/delete', [MovieController::class, 'destroy'])->name('destroy');

    }
    );


require __DIR__.'/auth.php';
