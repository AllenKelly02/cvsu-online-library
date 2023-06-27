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

        $books = Book::latest()->filter(request(['type', 'category', 'search']))->paginate(250);

        return view('books.index', [
            'books' => $books
        ]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function edit($id)
    {
        // Retrieve the book with the given ID from the database
        $book = Book::findOrFail($id);

        // Pass the book data to the view for rendering the edit form
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'nullable|max:255',
            'author' => 'nullable',
            'published_year' => 'nullable|numeric',
            'ISBN' => 'nullable|numeric',
            'publisher' => 'nullable',
            'pages' => 'nullable|numeric',
            'description' => 'nullable',
            'copy' => 'nullable',
            'bibliography' => 'nullable',
            'accession_number' => 'nullable|numeric',
            'call_number' => 'nullable|numeric',
            'edition' => 'nullable|numeric',
            // Add validation rules for other book attributes
        ]);

        // Find the book with the given ID and update its attributes
        $book = Book::findOrFail($id);
        $book->update($validatedData);

        return redirect()->route('admin.books.show', $book->id)->with(['message' => 'Update Book Successfully']);
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'type' => 'required',
            'category' => 'required',
            'published_year' => 'required',
            'publisher',
            'accession_number',
            'edition_number',
            'call_number',
            'ISBN' => 'required',
            'pages' => 'required',
            'copy' => 'copy',
            'description' => 'required',
            'bibliography',
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

    public function borrow(Request $request, $id)
    {

        $user = Auth::user();

        $book = Book::find($id);

        BookIssuing::create([
            'borrowed_date' => Carbon::now()->format('m-d-Y'),
            'user_id' => $user->id,
            'book_id' => $book->id,
            'status' => 'pending',
            'total_days' => 3,
        ]);

        // $book->update([
        //     'status' => 'Unavailable'
        // ]);

        return back()->with(['message' => "Your Book Request Has Send in Admin wait for the Approval"]);
    }

    // approve request borrowed books
    public function approvedBorrowBooks($id)
    {
        $bookIssuing = BookIssuing::find($id);



        $bookIssuing->update(
            [
                'is_approved' => true,
                'status' => 'approved',
                'penalty_payment' => 0
            ]
        );

        $book = $bookIssuing->book;
        
        if ($book->copy > 0) {
            $bookIssuing->book->update(['copy' => $book->copy - 1 ]);
        } else {
            $bookIssuing->book->update(['status' => 'unavailable', 'copy' => $book->copy - 1]);
        }

        return back();
    }
    // Admin Request reject
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


    //admin side list request of borrowed Books
    public function listRequestBorrowedBooks()
    {
        $bookRequest = BookIssuing::where('is_approved', false)->where('status', '!=', 'reject')->with('user', 'book')->get();
        return view('books.listrequestborrowedbooks', compact(['bookRequest']));
    }

    //admin side return book
    public function returnedBook($id)
    {
        $bookIssuing = BookIssuing::find($id);

        $bookIssuing->book->update(['status' => 'available', 'copy' => $bookIssuing->book->copy + 1 ]);


        $bookIssuing->update([
            'returned_date' => Carbon::now()->format('Y-m-d')
        ]);

        return back()->with(['message' => "Book Return Success"]);
    }


    public function browse()
    {
        $books = Book::latest()->filter(request(['category', 'search', 'type',]))->paginate(100);

        return view('books.browse', [
            'books' => $books
        ]);
    }


    public function addFavourite($id)
    {
        $user = Auth::user();

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
        $favoriteBook = UserFavouriteBook::where('book_id', $id)->first();
        $favoriteBook->delete();
        if ($favoriteBook) {
            return back()->with([
                'message' => 'Book has been removed in Favorite'
            ]);
        }
        return back();
    }

    public function allBorrowedBooks()
    {
        $bookIssuings = BookIssuing::with('book', 'user')->where('returned_date', '0000-00-00')->get();


        foreach($bookIssuings as $bookIssuing){

            if ($bookIssuing->created_at->diffInDays() > 3 && $bookIssuing->penalty_date !== Carbon::now()->format('M-d-Y')){
                if(!$bookIssuing->penalty) {

                    $bookIssuing->update([
                        'penalty' => true,
                        'penalty_payment' => ($bookIssuing->created_at->diffInDays() - $bookIssuing->total_days) * 5,
                        'penalty_date' => Carbon::now()->format('M-d-Y')
                    ]);
                } else {
                    $bookIssuing->update([
                        'penalty_payment' => $bookIssuing->penalty_payment + 5,
                        'penalty_date' => Carbon::now()->format('M-d-Y')
                    ]);
                }
            }
        }
        return view('books.borrowedbooks', compact(['bookIssuings']));
    }

    public function archivedbooks()
    {
        $books = Book::onlyTrashed()->get();


        return view('books.archivedbooks', compact(['books']));
    }
    public function destroy($id){
        $book = Book::find($id);

        $book->delete();


        return to_route('admin.books.index')->with(['delete' => 'Book Deleted !']);
    }
}
