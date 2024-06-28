<?php

use App\Http\Middleware\Role;
use App\Exports\ReturnedBooksExport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProfileController;
use Symfony\Component\Mime\MessageConverter;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BookScannerController;
use App\Http\Controllers\ThesisViewerController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Guest\MessageController;
use App\Http\Controllers\Librarian\BooksController;
use App\Http\Controllers\Accounts\AccountsController;
use App\Http\Controllers\Librarian\ImportBookController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
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


Route::post('/message', [MessageController::class, 'store'])->name('message');

Route::get('/image/{name}', [ImageController::class, 'view'])->name('image-view');
Route::get('/avatar/{name}', [ImageController::class, 'profile'])->name('avatar-profile');
Route::get('/student-cor/{name}', [ImageController::class, 'student_cor'])->name('student_cor');

// Route::get('/dashboard', function () {
//     return view('user.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/browse', [BooksController::class, 'browse'])->name('books.browse');

Route::middleware('auth')->group(function () {

    Route::post('/profile/{id}/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::post('/password/{id}/update', [ProfileController::class, 'updatePassword'])->name('update.password');

    Route::post('/profile/update/avatar', [ProfileController::class, 'avatar'])->name('update.avatar');

    Route::get('/profile/show/{id}', [ProfileController::class, 'show'])->name('profile.show');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


Route::middleware(['auth', 'role:admin'])->prefix('admin')->as('admin.')->group(function() {

    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');


    Route::prefix('scan')->as('scan.')->group(function(){
        Route::prefix('book')->as('book.')->group(function(){
            Route::get('index', [BookScannerController::class, 'index'])->name('index');
            Route::get('show/{book}', [BookScannerController::class, 'show'])->name('show');
        });
    });

    //categories
    Route::resource('category', CategoriesController::class);
    //delete category
    Route::post('/delete-category/{category}', [CategoriesController::class, 'destroy'])->name('category-delete');

    Route::get('/users-per-month', [DashboardController::class, 'getUsersPerMonth']);

    Route::prefix('messages')->as('messages.')->group(function (){
        Route::get('', [MessageController::class, 'index'])->name('index');
        Route::get('/show/{message}', [MessageController::class, 'show'])->name('show');
        Route::post('/reply', [MessageController::class, 'reply'])->name('reply');
    });

    //export returned books
    Route::get('/export-returned-books', function () {
        return \Maatwebsite\Excel\Facades\Excel::download(new ReturnedBooksExport(), 'returned_books.xlsx');
    })->name('export.returned.books');

    //import books from excel
    Route::prefix('books')->as('book.')->group(function(){
        Route::prefix('import')->as('import.')->group(function(){
            Route::get('/create', [ImportBookController::class,'create'])->name('create');
            Route::post('/upload', [ImportBookController::class,'upload'])->name('upload');
        });
    });

      //barcodes
      Route::get('/books/barcodes', [BooksController::class, 'bookBarcode'])->name('books.barcodes');

    Route::get('/books', [BooksController::class, 'index'])->name('books.index');

    Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');

    Route::post('/books/store', [BooksController::class, 'store'])->name('books.store');

    Route::get('/books/{id}/edit', [BooksController::class, 'edit'])->name('books.edit');

    Route::put('/books/{id}/edit', [BooksController::class, 'update'])->name('books.update');

    Route::get('/books/show/{book}', [BooksController::class, 'show'])->name('books.show');

    //Thesis Viewer
    Route::get('/thesis/{filename}', [ThesisViewerController::class, 'show'])->name('thesis_viewer');


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
    Route::post('/books/return/book/{id}', [BooksController::class, 'returnedBook'])->name('returned_book');
    Route::post('/returned-book/{id}', [BooksController::class, 'returnedBook'])->name('admin.returned-book');

    //delete book
    Route::post('/books/delete/{id}', [BooksController::class, 'destroy'])->name('book-delete');


    //lisft of Returned Books
    Route::get('/books/get/MonthlyBorrowedBooks', [BooksController::class, 'allReturnedBooks'])->name('getAllReturnedBooks');
    Route::get('/books/get/Returned', [BooksController::class, 'allReturnedBook'])->name('getReturnedBooks');

    //accounts
    Route::get('/verified-accounts', [AccountsController::class, 'verifiedAccounts'])->name('verified-accounts');

    Route::get('/unverified-accounts', [AccountsController::class, 'unverifiedAccounts'])->name('unverified-accounts');

    Route::post('/edit-accounts/{id}', [AccountsController::class, 'edit'])->name('edit-account');

    Route::post('/update-accounts/{id}', [AccountsController::class, 'update'])->name('update-account');

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
    Route::get('/books/borrowed/penalty/{book}', [CatalogController::class, 'penalty'])->name('penalty');

    //add favorite book
    Route::post('/books/show/{id}/addFavorite', [BooksController::class, 'addFavourite'])->name('addBookFavourite');

    //remove favorite book
    Route::post('/books/show/{id}/removeFavorite', [BooksController::class, 'removeFavourite'])->name('removeBookFavourite');


});

Route::get('/show', [BooksController::class, 'showPage'])->name('show');

require __DIR__.'/auth.php';
