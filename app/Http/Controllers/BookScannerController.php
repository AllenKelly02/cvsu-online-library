<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class BookScannerController extends Controller
{
    public function __construct(public Book $book){

    }
    public function index(){
        return view('scan.book.index');
    }

    public function show(String $id){

        $book = Book::where('accession_number', $id)->with(['bookIssuing.user'])->first();

        if($book == null){
            return response(['message' => 'Book Not Found'], 404);
        }

        return response(['book' => $book], 200);
    }
}
