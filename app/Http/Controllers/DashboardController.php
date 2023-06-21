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
        $thesisBooks = $this->bookQueryByCategory('thesis');
        $journalBooks = $this->bookQueryByCategory('journal');
        $bookBooks = $this->bookQueryByCategory('book');
        $eBooks = $this->bookQueryByCategory('e-book');
        $totalBorrowedBooksByMonths = $this->borrowedBookPerMonth();
        $books = Book::get();
        return view('dashboard.admin', compact(['user', 'books', 'bookIssuing',
        'thesisBooks', 'journalBooks', 'bookBooks', 'eBooks', 'totalBorrowedBooksByMonths']));
    }
    public function user()
    {
        return view('dashboard.user');
    }
    private function bookQueryByCategory($category)
    {
        $books = Book::where('category', $category)->get()->count();

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
