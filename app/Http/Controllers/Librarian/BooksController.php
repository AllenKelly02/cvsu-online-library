<?php

namespace App\Http\Controllers\Librarian;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Categories;
use App\Models\BookIssuing;
use Illuminate\Http\Request;
use App\Enums\EbookSourceType;
use App\Models\UserFavouriteBook;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Notifications\BookNotification;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

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

        $categories = Categories::get();

        return view('books.create', compact(['categories']));
    }

    public function edit($id)
    {
        // Retrieve the book with the given ID from the database
        $book = Book::findOrFail($id);

        // Pass the book data to the view for rendering the edit form
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $book = Book::find($id);

        $book->update([
            'title' => $request->title ?? $book->title,
            'author' => $request->author ?? $book->author,
            'published_year' => $request->published_year ?? $book->published_year,
            'ISBN' => $request->ISBN ?? $book->ISBN,
            'publisher' => $request->publisher ?? $book->publisher,
            'pages' => $request->pages ?? $book->pages,
            'description' => $request->description ?? $book->description,
            'copy' => $request->copy ?? $book->copy,
            'bibliography' => $request->bibliography ?? $book->bibliography,
            'accession_number' => $request->accession_number ?? $book->accession_number,
            'call_number' => $request->call_number ?? $book->call_number,
            'edition' => $request->edition ?? $book->edition,
        ]);

        return redirect()->route('admin.books.show', $book->id)->with(['message' => 'Update Book Successfully']);
    }

    public function store(Request $request)
    {

        // dd($request->all());

        // dd(EbookSourceType::LOCAL->value);



        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'type' => 'required',
            'category' => 'required',
            'published_year' => 'required',
            'publisher',
            'accession_number' => 'required',
            'edition_number',
            'call_number',
            'ISBN' => 'required',
            'pages' => 'required',
            'copy' => 'required',
            'description' => 'nullable',
            'bibliography',
            'course' => 'required',
        ]);
        $books = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'type' => $request->type,
            'category' => $request->category,
            'published_year' => $request->published_year,
            'publisher' => $request->publisher,
            'accession_number' => $request->accession_number,
            'edition_number' => $request->edition_number,
            'call_number' => $request->call_number,
            'ISBN' => $request->ISBN,
            'pages' => $request->pages,
            'copy' => $request->copy,
            'description' => $request->description,
            'bibliography' => $request->bibliography,
            'course' => $request->course
        ]);

        $image = $request->file('image');
        $ebook_source = $request->ebook_source;
        $ebook_source_type = $request->ebook_source_type;


        if ($ebook_source_type === EbookSourceType::LOCAL->value) {


            $ebook_name = 'EBOOK-' . uniqid() . '.' . $ebook_source->extension();

            $dir = $ebook_source->storeAs('/ebook', $ebook_name, 'public');

            $ebook_source = asset('/storage/' . $dir);
        }




        if ($image) {
            $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/book/image', $fileName);


            $books->update([
                'image' => $fileName,
                'ebook_link' => $ebook_source,
                'ebook_source' => $ebook_source_type
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
        $admin = User::where('role', 'admin')->first();
        $user = Auth::user();
        $book = Book::find($id);

        // Check if the user already has a book
        $existingBook = $book->bookIssuing()
            ->where('user_id', $user->id)
            ->where(function ($query) {
                $query->where('status', 'pending')->orWhere('returned_date', '0000-00-00');
            })
            ->latest()
            ->first();

        if ($existingBook !== null) {
            return back()->with(['warning' => "You already have a book that is pending or hasn't been returned yet."]);
        }

        if ($book->copy < 1) {
            return back()->with(['message' => "Book is currently Unavailable"]);
        }

        // Create a book issuing record
        BookIssuing::create([
            'borrowed_date' => Carbon::now()->format('Y-m-d'),
            'user_id' => $user->id,
            'book_id' => $book->id,
            'status' => 'pending',
            'total_days' => 3,
        ]);

        // Notify the admin about the book request
        $message = [
            'content' => "Student: {$user->name}, requesting to borrow a book {$book->title} Accession no. {$book->accession_number}"
        ];

        $admin->notify(new BookNotification($message));

        return back()->with(['success' => 'Book borrowing request submitted successfully.']);
    }

    // approve request borrowed books
    public function approvedBorrowBooks($id)
    {
        $bookIssuing = BookIssuing::find($id);

        $user = User::find($bookIssuing->user->id);

        if ($bookIssuing->book->copy < 1) {
            return back()->with(['message' => "Book is currently Unavailable"]);
        }

        $bookIssuing->update(
            [
                'is_approved' => true,
                'status' => 'approved',
                'penalty_payment' => 0
            ]
        );

        $book = $bookIssuing->book;

        if ($book->copy > 1) {
            $bookIssuing->book->update(['copy' => $book->copy - 1]);
        } else if ($book->copy == 1) {
            $bookIssuing->book->update(['status' => 'unavailable', 'copy' => $book->copy - 1]);
        }
        $message = [
            'content' => "Your Books Request Title: {$book->title} has been approved." .
             " Approved Date: " . now()->format('F d, Y')
        ];

        $user->notify(new BookNotification($message));



        return back()->with(['message' => "Request for borrowing book has been approved!"]);
    }
    // Admin Request reject
    public function rejectBorrowBooks($id)
    {
        $bookIssuing = BookIssuing::find($id);

        $user = User::find($bookIssuing->user->id);

        $bookIssuing->book->update([
            'status' => 'available'
        ]);

        $bookIssuing->update(
            [
                'status' => 'reject'
            ]
        );

        $bookIssuing->delete();

        $message = [
            'content' => "Your Books Request title {$bookIssuing->book->title} has been rejected." .
             " Rejected Date: " . now()->format('F d, Y')
        ];

        $user->notify(new BookNotification($message));

        return back()->with(['message' => "Request for borrowing book has been Rejected!"]);
    }


    //admin side list request of borrowed Books
    public function listRequestBorrowedBooks()
    {
        $bookRequest = BookIssuing::where('is_approved', false)->where('status', '!=', 'reject')->with('user', 'book')->get();
        return view('books.listrequestborrowedbooks', compact(['bookRequest']));
    }

    //admin side return book
    // public function returnedBook($id)
    // {
    //     $bookIssuing = BookIssuing::find($id);

    //     $bookIssuing->book->update(['status' => 'available', 'copy' => $bookIssuing->book->copy + 1]);


    //     $bookIssuing->update([
    //         'returned_date' => Carbon::now()->format('Y-m-d')
    //     ]);

    //     return back()->with(['message' => "Book Return Success"]);
    // }

    public function returnedBook(Request $request, $id)
    {
        $bookIssuing = BookIssuing::find($id);

        // Increment the copy attribute of the associated book
        $book = $bookIssuing->book;

        $user = User::find($bookIssuing->user->id);

        $book->update([
            'status' =>  'available',
            'copy' => $book->copy + 1
        ]);
        // $book->status ;
        // $book->copy += 1;
        // $book->save();

        $bookIssuing->update([
            'book_condition' => $request->book_condition, // Assuming you have an input named 'bookCondition' in your form
        ]);

        // Update the returned_date and book_condition of the book issuing record
        $bookIssuing->update([
            'returned_date' => now()->format('Y-m-d'),
        ]);


        $message = [
            'content' => "Book Title: {$bookIssuing->book->title} has been returned with a {$bookIssuing->book_condition} condition." .
            " Return Date: " . now()->format('F d, Y')
        ];

        $user->notify(new BookNotification($message));


        return back()->with(['message' => 'Book Return Success']);
    }

    public function browse()
    {
        $books = Book::latest()->filter(request(['category', 'search', 'type',]))->paginate(250);

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
        $bookIssuings = BookIssuing::with('book', 'user')->where('returned_date', '0000-00-00')->where('is_approved', true)->get();

        // uncomment this
        /*
        $testing_future_date_for_penalty = Carbon::now()->addDays(10)->format('M-d-Y');

        $testing_present_date_for_penalty = Carbon::now()->subDays(5)->diffInDays();



        foreach($bookIssuings as $bookIssuing){

            if ($testing_present_date_for_penalty > 3 && $bookIssuing->penalty_date !== $testing_future_date_for_penalty){
                if(!$bookIssuing->penalty) {

                    $bookIssuing->update([
                        'penalty' => true,
                        'penalty_payment' => ($testing_present_date_for_penalty - $bookIssuing->total_days) * 5,
                        'penalty_date' => $testing_future_date_for_penalty
                    ]);
                } else {
                    $bookIssuing->update([
                        'penalty_payment' => $bookIssuing->penalty_payment + 5,
                        'penalty_date' => $testing_future_date_for_penalty
                    ]);
                }
            }
        }*/


       // comment this if you want to test the penalty then uncomment the testing logic in the upper parts of this
       foreach ($bookIssuings as $bookIssuing) {

            if ($bookIssuing->created_at->diffInDays() > 3 && $bookIssuing->penalty_date !== Carbon::now()->format('M-d-Y')) {
                if (!$bookIssuing->penalty) {

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
            // $user = User::find($bookIssuing->user->id);

            // $message = [
            //     'content' => "Reminder: The book you borrowed is on due date, please return it to our campus librarian otherwise, you will have a penalty." .
            //      " Reminder Date: " . now()->format('F d, Y')
            // ];

            // $user->notify(new BookNotification($message));

        }

        return view('books.borrowedbooks', compact(['bookIssuings']));
    }


    public function allReturnedBooks()
    {
        // Fetch all returned books
        $returnedBooks = BookIssuing::with('book')->whereNotNull('returned_date')->get();

        return view('books.returnedbooks', compact('returnedBooks'));

    }


    public function archivedbooks()
    {
        $books = Book::onlyTrashed()->get();


        return view('books.archivedbooks', compact(['books']));
    }
    public function destroy(Request $request, $id)
    {
        $book = Book::find($id);


        $book->update([
            'reason_remove' => $request->reason
        ]);

        $book->delete();


        return to_route('admin.books.index')->with(['delete' => 'Book Deleted !']);
    }
    public function bookBarcode()
    {

        $books = Book::latest()->filter(request(['type', 'category', 'search']))->paginate(250);
        ;

        return view('scan.book.barcodes', compact(['books']));
    }



}
