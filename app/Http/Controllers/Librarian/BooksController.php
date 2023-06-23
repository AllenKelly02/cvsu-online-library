<?php

namespace App\Http\Controllers\Librarian;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BookIssuing;
use App\Models\UserFavouriteBook;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    public function index()
    {

        $books = Book::latest()->filter(request(['category', 'search']))->paginate(100);

        return view('books.index', [
            'books' => $books
        ]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category' => 'required',
            'published_year' => 'required',
            'publisher' => 'required',
            'accession_number' => 'required',
            'edition_number' => 'required',
            'call_number' => 'required',
            'ISBN' => 'required',
            'pages' => 'required',
            'description' => 'required',
            'bibliography' => 'required',
            'course' => 'required',
        ]);
        $books = Book::create($data);

        $image = $request->file('image');


        if ($image) {
            $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/book/image', $fileName);


            $books->update([
                'image' => asset('storage/book/image/' . $fileName)
            ]);
        }

        return back()->with(['message' => 'Book Added Successfully']);
    }

    public function search()
    {
    }


    public function show(Book $book)
    {

        $book = Book::find($book->id);

        return view('books.show', compact(['book']));
    }

    public function borrow($id)
    {
        $user =  Auth::user();

        $book = Book::find($id);

        BookIssuing::create([
            'borrowed_date' => Carbon::now()->format('Y-m-d'),
            'user_id' => $user->id,
            'book_id' => $book->id,
            'status' => 'pending'
        ]);

        // $book->update([
        //     'status' => 'Unavailable'
        // ]);

        return back()->with(['message' => "Book Borrowed Success"]);
    }

    // approve request borrowed books
    public function approvedBorrowBooks($id)
    {
        $bookIssuing = BookIssuing::find($id);

        $bookIssuing->update(
            [
                'is_approved' => true,
                'status' => 'approved'
            ]
        );


        $bookIssuing->book->update([
            'status' => 'Unavailable'
        ]);
        return back();
    }
//reject
    public function rejectBorrowBooks($id)
    {
        $bookIssuing = BookIssuing::find($id);

        $bookIssuing->update(
            [
                'status' => 'reject'
            ]
        );
        return back();
    }
    // list request of borrowed Books

    public function listRequestBorrowedBooks()
    {
        $bookRequest  = BookIssuing::where('is_approved', false)->where('status', '!=', 'reject')->with('user', 'book')->get();
        return view('books.listrequestborrowedbooks', compact(['bookRequest']));
    }

    public function returnedBook($id)
    {
        $bookIssuing = BookIssuing::find($id);

        $bookIssuing->book->update(['status' => 'available']);

        $bookIssuing->update([
            'returned_date' =>  Carbon::now()->format('Y-m-d')
        ]);

        return back()->with(['message' => "Book Return Success"]);
    }
    public function browse()
    {

        $books = Book::get();
        return view('books.browse', compact(['books']));
    }
    public function addFavourite($id)
    {
        $user  = Auth::user();

        $addFavourite = UserFavouriteBook::create([
            'user_id' => $user->id,
            'book_id' => $id
        ]);

        if ($addFavourite) {
            return back()->with([
                'message' => 'Book has been added in Favorite'
            ]);
        }
        return back();
    }
    public function removeFavourite($id)
    {
        $favoriteBook =  UserFavouriteBook::where('book_id', $id)->first();
        $favoriteBook->delete();
        return back();
    }
    public function allBorrowedBooks()
    {
        $bookIssuings = BookIssuing::with('book', 'user')->where('returned_date', '0000-00-00')->get();

        return view('books.borrowedbooks', compact(['bookIssuings']));
    }
}
