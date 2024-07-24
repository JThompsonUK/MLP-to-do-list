<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');

Route::get('/tasks/{task}/tick', [TaskController::class, 'tick'])->name('tasks.tick');

Route::get('/tasks/{task}/untick', [TaskController::class, 'untick'])->name('tasks.untick');

Route::get('/tasks/{task}/delete', [TaskController::class, 'delete'])->name('tasks.delete');
