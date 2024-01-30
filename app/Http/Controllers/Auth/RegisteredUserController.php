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
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'address' => 'required',
        //     'course' => 'required',
        //     'sex' => 'required',
        //     'email' => 'required|email|unique:unverified_accounts,email',
        //     'password' => 'required|min:8',
        //     'confirm_password' => 'required|min:8|confirmed',
        //     'student_id' => 'required|student_id|unique:unverified_accounts,student_id',
        //     'contact_number' => 'required|min:11|max:11|unique:unverified_accounts,contact_number',
        // ], [
        //     'first_name.required' => 'Please input your first name.',
        //     'last_name.required' => 'Please input your last name.',
        //     'address.required' => 'Please input your address.',
        //     'course.required' => 'Please select your course.',
        //     'sex.required' => 'Please select your sex.',
        //     'email.required' => 'The email field is required.',
        //     'email.email' => 'Please enter a valid email address.',
        //     'email.unique' => 'The email has already been taken.',

        //     'password.required' => 'The password field is required.',
        //     'password.min' => 'The password must be at least :min characters.',


        //     'confirm_password.required' => 'The confirm password field is required.',
        //     'confirm_password.min' => 'The confirm password must be at least :min characters.',
        //     'confirm_password.confirmed' => 'The confirm password does not match.',

        //     'student_id.required' => 'The student ID field is required.',
        //     'student_id.unique' => 'The student ID has already been taken.',

        //     'contact_number.required' => 'The contact number field is required.',
        //     'contact_number.min' => 'The contact number must be exactly :min digits.',
        //     'contact_number.max' => 'The contact number must be exactly :max digits.',
        //     'contact_number.unique' => 'The contact number has already been taken.',
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
