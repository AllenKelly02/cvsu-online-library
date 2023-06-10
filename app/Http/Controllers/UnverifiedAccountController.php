<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Middleware\Role;
use App\Models\UnverifiedAccount;
use Illuminate\Support\Facades\Hash;

class UnverifiedAccountController extends Controller
{
    public function index() {

        $accounts = UnverifiedAccount::get();

        return view('unverifiedaccount.index',
            compact(['accounts'])
        );
    }

    public function acceptAccount($id) {

        $account = UnverifiedAccount::where('id', $id)->first();

        $userAccount = [
            'name' => $account->first_name . ' ' . $account->middle_name . ' ' . $account->last_name,
            'email' => $account->email,
            'password' => Hash::make($account->password),
        ];

        $savedAccount = User::create($userAccount);

        $userRole = Role::where('name', 'user')->first();

        $savedAccount->assignRole($userRole);

        $userProfile = [
            'last_name' => $account->last_name,
            'first_name' => $account->first_name,
            'middle_name' => $account->middle_name,
            'student_id' => $account->student_id,
            'gender' => $account->gender,
            'street' => $account->street,
            'village' => $account->village,
            'municipality' => $account->municipality,
            'province' => $account->province,
            'zip_code' => $account->zip_code,
            'user_id' => $savedAccount->id
        ];

        $savedProfile = Profile::create($userProfile);

        $account->delete();

        return redirect()->back();

    }

    public function rejectAccount($id) {

        $account = UnverifiedAccount::where('id', $id)->first();

        $account->delete();

        return redirect()->back();

    }
}
