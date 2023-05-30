<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\BooksController;

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

Route::get('/dashboard', function () {
    return view('user.index');
})->middleware(['auth', 'verified'])->name('dashboard');

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

// BROWSE
Route::get('/books', [BooksController::class, 'books'])->name('books.index');

    Route::get('/browse', [BooksController::class, 'browse'])
    ->name('books.browse');

// CATALOGS
Route::get('/', [CatalogController::class, 'index'])->name('catalog');
Route::get('/top-collect', [CatalogController::class, 'topCollections'])->name('top-collect');
Route::get('/new-collections', [CatalogController::class, 'newCollections'])->name('new-collections');
Route::get('/about-us', [CatalogController::class, 'aboutUs'])->name('about-us');
Route::get('/ask-librarian', [CatalogController::class, 'askLibrarian'])->name('ask-librarian');



require __DIR__.'/auth.php';
