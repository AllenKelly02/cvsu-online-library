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
        return view('profile.edit', [
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
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        $user = $request->user();
        $user->name = $request->input('name');

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

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
