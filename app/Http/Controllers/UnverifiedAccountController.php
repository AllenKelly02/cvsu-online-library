<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewUserNotification;
use App\Notifications\DeleteNotification;
use Illuminate\Http\Request;
use App\Http\Middleware\Role;
use App\Models\UnverifiedAccount;
use Illuminate\Support\Facades\Hash;

class UnverifiedAccountController extends Controller
{
    public function index(Request $request) {

        $accounts = UnverifiedAccount::get();
        $image = $request->file('image');
        return view('unverified-accounts.index',
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
            'user_id' => $savedAccount->id,
        ];

        $savedProfile = Profile::create($userProfile);
    
        $message = [
            'content' => "Hello! Your registration request has been approved.  \nApproved Date: " . now()->format('F d, Y')
        ];
    
        // Send notification
        $savedAccount->notify(new NewUserNotification($message));
    
        $account->delete();
    
        return redirect()->back()->with(['message' => "Registration request accepted successfully"]);
    }


    public function rejectAccount(Request $request, $id) {
        $account = UnverifiedAccount::where('id', $id)->first();
    
        $message = [
            'content' => "Hello! Your registration request has been rejected.\nReason: " . $request->input('reason') . "\nRejected Date: " . now()->format('F d, Y')
        ];
    
        
        Notification::route('mail', $account->email) // Specify the email address directly
                   ->notify(new DeleteNotification($message));
    
        $account->delete();
    
        return redirect()->back()->with(['message' => "Registration request is rejected successfully"]);
    }
    
}


