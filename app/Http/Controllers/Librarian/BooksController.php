<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function books() {

        // $books = Books::latest()->paginate(30)->get();

        return view('books.index');
    }
}
