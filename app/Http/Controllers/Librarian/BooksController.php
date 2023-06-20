<?php

namespace App\Http\Controllers\Librarian;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
    public function index() {

        $books = Book::latest()->filter(request(['category', 'search']))->paginate(10);

        return view('books.index', [
            'books' => $books
        ]);
    }

    public function create() {
        return view('books.create');
    }

    public function store(Request $request) {

        $books = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'category' => $request->category,
            'publication_year' => $request->publication_year,
            'publisher' => $request->publisher,
            'accession_number' => $request->accession_number,
            'edition_number' => $request->edition_number,
            'call_number' => $request->call_number,
            'ISBN' => $request->ISBN,
            'pages' => $request->pages,
            'description' => $request->description,
            'bibliography' => $request->bibliography,
            'course' => $request->course,

        ]);

        return back()->with(['message' => 'Book Added Successfully']);
    }

    public function search() {

    }


    public function show(Book $book) {

        $book = Book::find($book->id)->first();

        return view('books.show', compact(['book']));


    }

}
