<?php

namespace App\Http\Controllers\Librarian;

use App\Models\Books;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
    public function index() {

        $books = Books::latest()->filter(Request(['category', 'search']))->paginate(10);

        return view('books.index', [
            'books' => $books
        ]);
    }

    public function create() {
        return view('books.create');
    }

    public function store(Request $request) {
        
    }

    public function search() {

    }
    
    public function show() {
        return view('books.show');
    }

}
