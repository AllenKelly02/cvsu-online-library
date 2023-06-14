<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\UnverifiedAccount;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }



    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $unverified = UnverifiedAccount::create([
            'last_name' => $request->lastName,
            'first_name' => $request->firstName,
            'middle_name' => $request->middle_name,
            'sex' => $request->sex,
            'block' => $request->block,
            'subdivision' => $request->subdivision,
            'barangay' => $request->barangay,
            'municipality'=> $request->municipality,
            'province' => $request->province,
            'zip_code' => $request->zip_code,
            'student_id' => $request->studentId,
            'email' => $request->email,
            'password' => $request->password,

           
        ]);
        
      return Redirect::to('login')->with('message', 'Thanks for registering! Wait for the approval of the librarian.');

    }

}
