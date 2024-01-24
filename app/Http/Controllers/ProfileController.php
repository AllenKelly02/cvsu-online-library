<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\View\View;
use App\Models\BookIssuing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $user = User::where('id', $request->id)->with('profile')->first();
        return view('user.profile.edit', [
            'user' => $user
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
    public function update(Request $request, $id): RedirectResponse
    {
        // dd($request->all());

        $user = User::find($request->id);


        $user->update([
            'email' => $request->email ?? $user->email,
            'password' => $request->password !== null ? Hash::make($request->password) : $user->password
        ]);

        if ($request->has('image')) {

            $imageName =  'AVTR-' . uniqid() . '.' . $request->image->extension();

            $dir = $request->image->storeAs('/avatar', $imageName, 'public');


            $profile = Auth::user()->profile;

            $profile->update([
                'avatar' => $imageName
            ]);
        }

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
        if (!$profile) {
            return redirect()->back()->with('message','Unable to update profile.');
        }

        return back()->with(['user' => $user->id, 'message' => 'Profile updated successfully.']);

        // return Redirect::route('profile.edit', $user->id)->with('status', 'profile-updated')->with(['message' => 'Profile Update Successfully']);
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
            'avatar' => $imageName
        ]);


        return to_route('profile.show', ['id' => $profile->id]);
    }


    public function updatePassword(Request $request, $userId) {
        $data = $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required',
            'confirmNewPassword' => 'required'
        ]);

        if ($data['newPassword'] !== $data['confirmNewPassword']) {
            return redirect()->back()->withErrors(['confirmNewPassword' => 'Passwords do not match.']);
        }

        $user = User::find($userId);

        if (!$user) {
            return back()->withErrors('User not found!');
        }

        $updated = $user->update([
            'passord' => $request->newPassword
        ]);
        
        if ($updated) {
            return back()->with('message', 'Password updated sucessfully');
        } else {
            return back()->with('message', 'Password could not be updated');
        }


    }
}
