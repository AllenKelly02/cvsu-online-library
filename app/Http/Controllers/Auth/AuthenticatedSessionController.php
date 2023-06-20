<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Redirect;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {

        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $role = $request->user()->role;

        switch($role){
            case 'admin' : return redirect(route('admin.dashboard'));
            break;
            case 'user' : return redirect(route('user.catalog'));
        }

        // if ($role === 'admin') {
        //     $url = route('admin.dashboard');
        // } else {
        //     $url = route('user.catalog');
        // }
        //     $request->session()->regenerate();
        //     $request->session()->put('url.intended', $url);

        //     return redirect()->intended($url);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
