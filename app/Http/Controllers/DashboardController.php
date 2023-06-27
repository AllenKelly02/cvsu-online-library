<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BookIssuing;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function admin()
    {
        $user = User::where('role', 'user')->get();

        $bookIssuing = BookIssuing::where('returned_date', '0000-00-00')->get();

        $thesisBooks = $this->bookQueryByType('thesis');
        $journalBooks = $this->bookQueryByType('journal');
        $bookBooks = $this->bookQueryByType('book');
        $eBooks = $this->bookQueryByType('e-Book');

        $totalBorrowedBooksByMonths = $this->borrowedBookPerMonth();

        $books = Book::get();
        
        return view('dashboard.admin', compact(['user', 'books', 'bookIssuing',
        'thesisBooks', 'journalBooks', 'bookBooks', 'eBooks', 'totalBorrowedBooksByMonths']));
    }
    public function user()
    {
        return view('dashboard.user');
    }
    private function bookQueryByType($type)
    {
        $books = Book::where('type', $type)->get()->count();

        return $books;
    }
    private function borrowedBookPerMonth()
    {
        $data = BookIssuing::query()->whereYear('created_at', now()->year)->get()->groupBy(function ($q) {
            return Carbon::parse($q->created_at)->format('M');
        })->map(function ($items, $month) {
            return $items->count();
        })
            ->sortKeys()
            ->all();

        $months = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ];

        $result = [];

        foreach ($months as $month) {
            $count = $data[$month] ?? 0;
            $result[$month] = $count;
        }

        return $result;
    }
}
