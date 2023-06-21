<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CatalogController extends Controller
{
    public function catalog()
    {

        $books = Book::latest()->get();

        return view('user.navbar.catalog', compact('books'));
    }
    public function borrowedHistory()
    {

        $user = Auth::user();
        $borrowed = $user->booksIssuing()->get();
        return view('user.borrowed.index', compact('borrowed'));
    }
    public function topCollections()
    {
        // Logic for the top collections page
        return view('user.navbar.top-collect');
    }

    public function newCollections()
    {
        // Logic for the new collections page

        $books = Book::get();
        return view('user.navbar.new-collections', compact(['books']));
    }

    public function aboutUs()
    {
        // Logic for the about us page
        return view('user.navbar.about-us');
    }

    public function askLibrarian()
    {
        // Logic for the ask a librarian page
        return view('user.navbar.ask-librarian');
    }
}
