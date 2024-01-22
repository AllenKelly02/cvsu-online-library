<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {




        $userOne = User::create(
            [
                'name' => 'Librarian Staff',
                'email' => 'librarian@email.com',
                'password' => Hash::make('librarian123'),
                'role' => 'admin',
                'student_id' => 123123213123
                // 'profile_id' => 1,
            ]
            );

            $userTwo = User::create(
                [
                    'name' => 'Gia Nina Condes',
                    'email' => 'gia@email.com',
                    'password' => Hash::make('gia123'),
                    'role' => 'user',
                    'student_id' => 1231331321321313
                    // 'profile_id' => 2,
                ]
            );
        Profile::create(
            [
                'last_name' => 'Staff',
                'first_name'  => 'Librarian',
                'middle_name' => '',
                'student_id' => '09991234',
                'course' => 'admin',
                'sex' => 'Male',
                'contact_number' => '09092342345',
                'address' => 'Sample Address',
                'email' => 'librarian@email.com',
                'password' => 'librarian123',
                'user_id' => $userOne->id
            ]
        );

       Profile::create(
        [
            'last_name' => 'Condes',
            'first_name'  => 'Gia',
            'middle_name' => 'Soledad',
            'student_id' => '20011175',
            'course' => 'BSIT',
            'sex' => 'Female',
            'contact_number' => '09092342345',
            'address' => 'Sample Address',
            'email' => 'gia@email.com',
            'password' => 'gia123',
            'user_id' => $userTwo->id
        ]
       );
    }
}
