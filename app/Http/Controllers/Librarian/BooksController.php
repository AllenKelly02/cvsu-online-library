<?php

namespace App\Http\Controllers\Librarian;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BookIssuing;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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

        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category' => 'required',
            'published_year' => 'required',
            'publisher' => 'required',
            'accession_number' => 'required',
            'edition_number'=> 'required',
            'call_number' => 'required',
            'ISBN' => 'required',
            'pages' => 'required',
            'description' => 'required',
            'bibliography' => 'required',
            'course' => 'required',
            'category' => 'required'
         ]);
        $books = Book::create($data);

        $image = $request->file('image');


        if($image) {
            $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/book/image', $fileName);


            $books->update([
                'image' => asset('storage/book/image/' . $fileName)
            ]);
        }



        return back()->with(['message' => 'Book Added Successfully']);
    }

    public function search() {

    }


    public function show(Book $book) {

        $book = Book::find($book->id);

        return view('books.show', compact(['book']));
    }

    public function borrow ($id) {
        $user =  Auth::user();

        $book = Book::find($id);

        BookIssuing::create([
            'borrowed_date' => Carbon::now()->format('Y-m-d'),
            'user_id' => $user->id,
            'book_id' => $book->id
        ]);

        $book->update([
            'status' => 'Unavailable'
        ]);

        return back()->with(['message' => "Book Borrowed Success"]);
    }

    public function returnedBook($id){
        $bookIssuing = BookIssuing::find($id);

        $bookIssuing->book->update(['status' => 'available']);

        $bookIssuing->update([
            'returned_date' =>  Carbon::now()->format('Y-m-d')
        ]);

        return back()->with(['message' => "Book Return Success"]);
    }
    public function browse(){

        $books = Book::get();
        return view('books.browse', compact(['books']));
    }
}
