<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index'])->name('index');

Route::get('/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/create', [TaskController::class, 'store']);

Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::post('/{task}/edit', [TaskController::class, 'update']);

Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::get('/all', [TaskController::class, 'all'])->name('all');

