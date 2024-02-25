<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TransactionController;

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

// Route::get('/',function () {
//     return view('welcome');
// });


Route::get('/', [TransactionController::class, 'index'])->name('home');
Route::get('/create', [TransactionController::class, 'create'])->name('create');
Route::post('/create', [TransactionController::class, 'store'])->name('saveCreate');

Route::get('/edit/{id}', [TransactionController::class, 'edit'])->name('edit');
Route::put('/edit/{id}', [TransactionController::class, 'update'])->name('saveEdit');

Route::get('/delete/{id}', [TransactionController::class, 'destroy'])->name('delete');
