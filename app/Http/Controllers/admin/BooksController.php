<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books;

class BooksController extends Controller
{
    public function index() {

        // $books = Books::latest()->paginate(30)->get();

        return view('books.index');
    }
}
