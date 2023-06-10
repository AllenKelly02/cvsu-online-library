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
    public function verifiedAccounts() {

        $accounts = User::where('role', 'user')->get();
        return view('verified-accounts.index', compact(['accounts']));
    }

    public function acceptAccount($id) {

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
            'student_id' => $account->student_id,
            'gender' => $account->sex,
            'street' => $account->block,
            'village' => $account->subdivision,
            'municipality' => $account->municipality,
            'province' => $account->province,
            'zip_code' => $account->zip_code,
            'user_id' => $savedAccount->id
        ];

        $savedProfile = Profile::create($userProfile);

        $account->delete();

        return redirect()->back();

    }

    public function unverifiedAccounts() {

        $accounts = UnverifiedAccount::get();


        return view('unverified-accounts.index', compact('accounts'));
    }

    public function rejectAccount($id) {

        $account = UnverifiedAccount::where('id', $id)->first();

        $account->delete();



        return back()->with(['message' => 'deleted Successfully']);

    }
    public function destroy($id){

        $user = User::find($id);


        $user->profile->delete();

        $user->delete();


        return back()->with(['message' => 'Account Sucessfully Deleted']);


    }
}
