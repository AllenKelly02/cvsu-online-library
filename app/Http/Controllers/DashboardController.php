<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\BookIssuing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use LDAP\Result;

class DashboardController extends Controller
{
    public function admin()
    {
        $user = User::where('role', 'user')->get();

        $bookIssuing = BookIssuing::where('returned_date', '0000-00-00')->get();


        $booksRanking = Book::withCount('bookIssuing')->orderBy('book_issuing_count', 'desc')->get();


        $booksTotalByCategory = $this->booksDataByType();
        $totalBorrowedBooksByMonths = $this->borrowedBookPerMonth();

        $monthlyUsers = json_encode($this->getUsersCreatedPerMonth());

        $books = Book::where('status', 'available');
        return view('dashboard.admin', compact(['user', 'books', 'bookIssuing', 'booksTotalByCategory', 'booksRanking', 'totalBorrowedBooksByMonths', 'monthlyUsers']));
    }
    public function user()
    {
        return view('dashboard.user');
    }
    private function booksDataByType()
    {

        $books = Book::get()->groupBy('category')->map(function ($q) {
            return $q->count();
        });


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

    //borrowed Book Report

    private function getUsersPerMonth()
    {
        $user = User::where('role', 'user')->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
            ->groupBy('month')
            ->get();

        return view('user.line-chart', compact('usersPerMonth'));
    }
    function getUsersCreatedPerMonth()
    {
        // Get all months
        // Retrieve user count by month
        $startDate = now()->startOfYear();
        $endDate = now()->endOfYear();

        $annualUserData = [];

        for ($date = $startDate; $date->lte($endDate); $date->addMonth()) {
            $monthOfYear = $date->format('F'); // Get the month name

            $users = User::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();

            // Initialize count to 0 if no users found
            $users = ($users) ? $users : 0;

            $annualUserData[] = [
                'name' => $monthOfYear,
                'users' => $users,
            ];
        }

        return $annualUserData;
    }
}

// UserController.php
