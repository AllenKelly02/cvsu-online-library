<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UnverifiedAccount;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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
            'last_name' => $request->info['lastName'],
            'first_name' => $request->info['firstName'],
            'middle_name' => $request->info['middle_name'],
            'sex' => $request->info['sex'],
            'block' => $request->info['block'],
            'subdivision' => $request->info['subdivision'],
            'barangay' => $request->info['barangay'],
            'municipality'=> $request->info['municipality'],
            'province' => $request->info['province'],
            'zip_code' => $request->info['zip_code'],
            'student_id' => $request->info['studentId'],
            'email' => $request->info['email'],
            'password' => $request->info['password']
        ]);

        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // event(new Registered($user));

        // Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
