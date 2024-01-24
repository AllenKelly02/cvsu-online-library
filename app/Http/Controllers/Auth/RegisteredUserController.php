<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\UnverifiedAccount;
use App\Http\Controllers\Controller;
use App\Notifications\NewUserNotification;
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
       
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('role', 'admin')->first();

        $student_cor = 'stdntcr-' . $request->last_name . '-' . uniqid() . '.' . $request->student_cor->extension();
        $validID_dir = $request->student_cor->storeAs('/unverified/student/COR', $student_cor, 'public');

        $unverified = UnverifiedAccount::create([
            'first_name' => $request->firstName,
            'middle_name' => $request->middle_name,
            'last_name' => $request->lastName,
            'address' => $request->address,
            'course' => $request->course,
            'sex' => $request->sex,
            'contact_number' => $request->contact_number,
            'student_id' => $request->studentId,
            'email' => $request->email,
            'password' => $request->password,
            'student_cor' => $student_cor
        ]);


        $message = [
            'content' => "New Registered Student: {$request->lastName}, {$request->firstName} {$request->middle_name} Student ID {$request->studentId}"
        ];


        $user->notify(new NewUserNotification($message));

        return Redirect::to('login')->with('message', 'Thanks for registering! Wait for the approval of the librarian.');
    }
}
