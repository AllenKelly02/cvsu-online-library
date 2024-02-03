<?php

namespace App\Http\Controllers\Accounts;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Middleware\Role;
use App\Models\UnverifiedAccount;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AccountsController extends Controller
{
    public function verifiedAccounts()
    {

        $accounts = User::where('role', 'user')->get();
        return view('verified-accounts.index', compact(['accounts']));
    }

    public function acceptAccount($id)
    {

        $account = UnverifiedAccount::where('id', $id)->first();

        $userAccount = [
            'name' => $account->first_name . ' ' . $account->middle_name . ' ' . $account->last_name,
            'email' => $account->email,
            'password' => Hash::make($account->password),
        ];

        $savedAccount = User::create($userAccount);

        $userProfile = [
            'last_name' => $account->last_name,
            'first_name' => $account->first_name,
            'middle_name' => $account->middle_name,
            'course' => $account->course,
            'address' => $account->address,
            'student_id' => $account->student_id,
            'sex' => $account->sex,
            'contact_number' => $account->contact_number,
            'email' => $account->email,
            'password' => $account->password,
            'user_id' => $savedAccount->id
        ];

        $savedProfile = Profile::create($userProfile);

        $account->delete();

        return redirect(route('admin.unverified-accounts'))->with(['message' => 'Accepted Succesfully']);
    }

    public function unverifiedAccounts()
    {

        $accounts = UnverifiedAccount::get();


        return view('unverified-accounts.index', compact('accounts'));
    }

    public function rejectAccount($id)
    {

        $account = UnverifiedAccount::where('id', $id)->first();

        $account->delete();

        return redirect(route('admin.unverified-accounts'))->with(['message' => 'Reject Succesfully']);
    }
    public function destroy(Request $request, $id)
    {

        $user = User::find($id);

        $user->profile->delete();

        $user->delete();

        $user->update([
            'reason' => $request->reason,
        ]);

        return back()->with(['message' => 'Account Sucessfully Deleted']);
    }
    public function edit($id)
    {

        $user = User::find($id);

        return view('verified-accounts.edit', compact(['user']));


    }
    public function update(Request $request, string $id)
    {



        // $request->validate(['password' => 'confirmed|nullable']);

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


        return back()->with(['message' => 'Data Updated ']);
    }
 }
