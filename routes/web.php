<?php


use App\Livewire\AddData;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;


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

Route::get('/', function () {
    return view('welcome');
});
 Route::post('/entry', [UserController::class, 'store'])->name('users.store');


Route::get('/posts', [UserController::class, 'showposts'])->name('showposts');
Route::get('/manage', [UserController::class, 'index'])->name('users.index');
// Route::get('manage', [UserController::class, 'manage'])->name('manage');
Route::get('/users/{id}/edit', [UserController::class,'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class,'update'])->name('users.update');
Route::delete('/users/{id}',[UserController::class, 'destroy'] )->name('users.destroy');
Route::get('/message', [MessageController::class, 'index'])->name('message.index');
Route::post('/message', [MessageController::class, 'store'])->name('message.store');


