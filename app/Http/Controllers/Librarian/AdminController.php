<?php

namespace App\Http\Controllers\Librarian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $userCount = User::count();
        return view('dashboard.admin', compact('userCount'));
    }
}
