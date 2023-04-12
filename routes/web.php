<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;

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

Route::get('/', [TodoListController::class, 'index']);

Route::post('/uploadTaskRoute', [TodoListController::class, 'uploadTask'])->name('uploadTask');

Route::post('/completeTaskRoute/{id}', [TodoListController::class, 'completeTask'])->name('completeTask');

Route::post('/incompleteTaskRoute/{id}', [TodoListController::class, 'incompleteTask'])->name('incompleteTask');

Route::post('/deleteTaskRoute/{id}', [TodoListController::class, 'deleteTask'])->name('deleteTask');
