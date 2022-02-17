<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Auth::routes();

Route::get('/home', [TodoController::class, 'index'])->name('home');

Route::get('/home/tambah', [TodoController::class, 'tambah']);
Route::post('/home/simpan',[TodoController::class, 'simpan']);

Route::get('/home/edit/{id}', [TodoController::class, 'edit']);
Route::put('/home/update/{id}',[TodoController::class, 'update']);

Route::get('/home/hapus/{id}', [TodoController::class, 'delete']);
// Route::put('/home/update/{id}', [TodoController::class, 'update']);
// Route::get('/todo', 'TodoController@index');

Route::put('home/complete/{todo}', [TodoController::class, 'complete'])->name('todo.complete');
Route::delete('home/incomplete/{todo}', [TodoController::class, 'incomplete'])->name('todo.incomplete');

