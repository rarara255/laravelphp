<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks/create', [\App\Http\Controllers\TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [\App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');

Route::get('/tasks/edit/{id}', [\App\Http\Controllers\TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}', [\App\Http\Controllers\TaskController::class, 'update'])->name('tasks.update');

Route::get('/tasks', [\App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/{id}', [\App\Http\Controllers\TaskController::class, 'show'])->name('tasks.show');
Route::delete('/tasks/{id}', [\App\Http\Controllers\TaskController::class, 'destroy'])->name('tasks.destroy');


Route::middleware('guest')->group(function (){
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});
