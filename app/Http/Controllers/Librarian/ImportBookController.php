<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use App\Imports\BookImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportBookController extends Controller
{

    public function create(){
        return view('books.import.create');
    }

    public function upload(Request $request){
       request()->validate([
            'books' => 'required|mimes:xlx,xls,xlsx|max:2048'
        ]);

        Excel::import(new BookImport, $request->file('books'));

        return back()->with(['message' => 'Data Imported']);

    }
}
