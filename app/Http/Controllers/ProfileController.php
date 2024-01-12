<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\View\View;
use App\Models\BookIssuing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;


class ProfileController extends Controller
{
    public function index()
    {
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('user.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function show($id)
{
    // Find the user by ID with their profile
    $profile = User::where('id', $id)->with('profile')->first();

    // Check if the user was found
    if (!$profile) {
        // Handle the case where the user was not found
        return abort(404); // or redirect to an error page or do something else
    }

    // Now, you can safely access the user's properties
    $bookIssuing = BookIssuing::where('user_id', $profile->id)->with('book')->get();

    return view('profile.show', compact('profile', 'bookIssuing'));
}
    /**
     * Update the user's profile information.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $user = User::find($id);



        $user->update([
            'email' => $request->email ?? $user->email,
            'password' => $request->password !== null ? Hash::make($request->password) : $user->password
        ]);

        $profile = $user->profile;

        $profile->update([
            'last_name' => $request->last_name ?? $user->profile->last_name,
            'first_name' => $request->first_name ?? $user->profile->first_name,
            'middle_name' => $request->middle_name ?? $user->middle_name,
            'course' => $request->course ?? $user->profile->course,
            'address' => $request->address ?? $user->profile->address,
            'student_id' => $request->student_id ?? $user->profile->student_id,
            'sex' => $request->sex ?? $user->profile->sex,
            'contact_number' => $request->contact_number ?? $user->profile->contact_number,
            'email' => $request->email ?? $user->email,
            'password' => $request->password ?? $user->password,
            'user_id' => $user->id
        ]);


        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function avatar(Request $request)
    {


        $request->validate([
            'image' => 'mimes:png,jpg',
        ]);

        $image = $request->image;


        $imageName =  'AVTR-' . uniqid() . '.' . $image->extension();

        $dir = $request->image->storeAs('/avatar', $imageName, 'public');


        $profile = Auth::user()->profile;


        $profile->update([
            'avatar' => asset('/storage/' . $dir)
        ]);


        return to_route('profile.show', ['id' => $profile->id]);
    }
}
