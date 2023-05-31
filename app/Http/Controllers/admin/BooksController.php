<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books;

class BooksController extends Controller
{
    public function list() {

        // $books = Books::latest()->paginate(30)->get();

        return view('admin.books.index');
    }

    // public function browse() {

    //     // $books = Books::latest()->paginate(30)->get();

    //     return view('books.browse');
    // }
}
