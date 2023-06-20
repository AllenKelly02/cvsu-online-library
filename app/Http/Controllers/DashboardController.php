<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function admin() {
        $user = User::where('role', 'user');
        return view('dashboard.admin', compact('user'));
    }

    public function user()
    {
        return view('dashboard.user');
    }
}
