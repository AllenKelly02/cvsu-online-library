<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class CatalogController extends Controller
    {
        public function catalog ()
        {

            $books = Book::all();

            // Logic for the catalog page
            // You can return a view or perform any other actions as needed
            return view('user.navbar.catalog', compact('books'));



        }

        public function topCollections()
        {
            // Logic for the top collections page
            return view('user.navbar.top-collect');
        }

        public function newCollections()
        {
            // Logic for the new collections page
            return view('user.navbar.new-collections');
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

