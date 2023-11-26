<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;

class CatalogController extends Controller
{
    public function catalog(Request $request)
    {

        $books = Book::latest()->filter(request(['category', 'search']))->paginate(100);
        if($request->category != null){
           $books = Book::latest()->whereCategory($request->category)->get();
        }

        $categories = Categories::get();

        return view('user.navbar.catalog', compact(['books', 'categories']));
    }
    public function borrowedHistory()
    {



        $user = Auth::user();
        $borrowed = $user->booksIssuing()->where('status', '!=', 'reject')->get();


        //check if borrowed books have panalty
        foreach($borrowed as $_borrowed) {
            if($_borrowed->returned_date === '0000-00-00'){
                if(!$_borrowed->penalty && $_borrowed->is_approved) {
                    if($_borrowed->created_at->diffInDays() > $_borrowed->total_days) {
                        $_borrowed->update([
                            'penalty' => true,
                            'penalty_payment' => 10
                        ]);
                    }
                } else{
                    if($_borrowed->penalty) {
                        $total = $_borrowed->penalty_payment + 10;
                        $_borrowed->update([
                            'penalty_payment' => $total,
                        ]);
                    }
                }
            }
        }

        return view('user.borrowed.index', compact('borrowed'));
    }
    public function topCollections()
    {

        // Logic for the top collections page

        $user = Auth::user();

        $favorites = $user->favourite_books()->with('book')->get();

        return view('user.navbar.top-collect', compact(['favorites']));
    }
    public function newCollections()
    {
        // Logic for the new collections page

       $books = Book::latest()->filter(request(['category', 'search']))->paginate(100);

        return view('user.navbar.new-collections', [
            'books' => $books
        ]);
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
