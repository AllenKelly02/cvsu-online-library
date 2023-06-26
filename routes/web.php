<?php

use App\Http\Controllers\Accounts\AccountsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Librarian\BooksController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/browse', [BooksController::class, 'browse'])->name('books.browse');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::get('/profile/show/{id}', [ProfileController::class, 'show'])->name('profile.show');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});


Route::middleware(['auth', 'role:admin'])->prefix('admin')->as('admin.')->group(function() {

    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');

    Route::get('/books', [BooksController::class, 'index'])->name('books.index');

    Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');

    Route::post('/books/store', [BooksController::class, 'store'])->name('books.store');

    Route::get('/books/{id}/edit', [BooksController::class, 'edit'])->name('books.edit');

    Route::put('/books/{id}/edit', [BooksController::class, 'update'])->name('books.update');

    Route::get('/books/show/{book}', [BooksController::class, 'show'])->name('books.show');

    //list of Borrowed
    Route::get('/books/get/Borrow', [BooksController::class, 'allBorrowedBooks'])->name('getAllBorrowedBooks');

    //approved Request borrowed books
    Route::post('/books/{id}/borrowed/request', [BooksController::class, 'approvedBorrowBooks'])->name('approvedBorrowedBooks');

    //reject Request Borrowed Books
    Route::post('/books/{id}/borrowed/reject/request', [BooksController::class, 'rejectBorrowBooks'])->name('rejectBorrowedBooks');

    //list request borrowed books
    Route::get('/books/list/borrowed/request',[BooksController::class, 'listRequestBorrowedBooks'])->name('listRequestBorrowedBooks');

    //list archived books
    Route::get('/books/archivedbooks', [BooksController::class, 'archivedbooks'])->name('books.archivedbooks');

    //return book
    Route::post('/books/return/book/{id}', [BooksController::class, 'returnedBook'])->name('returned-book');

    //delete book
    Route::post('/books/delete/{id}', [BooksController::class, 'destroy'])->name('book-delete');




    Route::get('/verified-accounts', [AccountsController::class, 'verifiedAccounts'])->name('verified-accounts');

    Route::get('/unverified-accounts', [AccountsController::class, 'unverifiedAccounts'])->name('unverified-accounts');

    Route::post('/accept-account/{id}', [AccountsController::class, 'acceptAccount'])->name('accept-account');

    Route::post('/reject-account/{id}',[AccountsController::class, 'rejectAccount'])->name('reject-account');

    Route::post('/delete-account/{id}', [AccountsController::class, 'destroy'])->name('delete-account');
});


Route::middleware(['auth', 'role:user'])->prefix('user')->as('user.')->group(function() {

    Route::get('/catalog', [CatalogController::class, 'catalog'])->name('catalog');

    Route::get('/top-collect', [CatalogController::class, 'topCollections'])->name('top-collect');

    Route::get('/new-collections', [CatalogController::class, 'newCollections'])->name('new-collections');

    Route::get('/about-us', [CatalogController::class, 'aboutUs'])->name('about-us');

    Route::get('/ask-librarian', [CatalogController::class, 'askLibrarian'])->name('ask-librarian');

    Route::get('/books', [BooksController::class, 'index'])->name('books.index');

    Route::get('/books/show/{book}', [BooksController::class, 'show'])->name('books.show');

    Route::post('/book/borrow/{id}', [BooksController::class, 'borrow'])->name('borrow-book');

    Route::get('/books/borrowed/list', [CatalogController::class, 'borrowedHistory'])->name('borrow-history');

    //add favorite book
    Route::post('/books/show/{id}/addFavorite', [BooksController::class, 'addFavourite'])->name('addBookFavourite');

    //remove favorite book
    Route::post('/books/show/{id}/removeFavorite', [BooksController::class, 'removeFavourite'])->name('removeBookFavourite');

});

Route::get('/show', [BooksController::class, 'showPage'])->name('show');

require __DIR__.'/auth.php';
