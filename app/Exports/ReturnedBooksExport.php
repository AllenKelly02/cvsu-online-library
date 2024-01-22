<?php

namespace App\Exports;

use App\Models\BookIssuing;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReturnedBooksExport implements FromView
{
    public function view(): View
    {
        $returnedBooks = BookIssuing::with('book')->whereNotNull('returned_date')->get();

        return view('returned-books.export', compact('returnedBooks'));
    }
}
