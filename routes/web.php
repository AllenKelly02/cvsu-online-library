<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\BooksController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/dashboard', function () {
//     return view('user.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::get('/profile/index', [ProfileController::class, 'index'])->name('profile.index');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


// Route::middleware('role:user')->prefix('user')->as('user.')->group(function (){


// });

Route::middleware(['auth', 'role:admin'])->prefix('admin')->as('admin.')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'admin'])
    ->name('dashboard');
});

Route::middleware(['auth', 'role:user'])->prefix('user')->as('user.')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'user'])
    ->name('dashboard');
});



Route::get('/books', [BooksController::class, 'index'])->name('books.index');





require __DIR__.'/auth.php';
