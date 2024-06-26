<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userOne = User::create(
            [
                'name' => 'Faculty',
                'email' => 'itsfaculty@gmail.com',
                'password' => Hash::make('Faculty123'),
                'role' => 'admin',
                'student_id' => 8923843282
                // 'profile_id' => 1,
            ]
            );

        Profile::create(
            [
                'last_name' => 'Faculty',
                'first_name'  => 'IT',
                'middle_name' => '',
                'student_id' => 'N/A',
                'course' => 'N/A',
                'sex' => 'Male',
                'contact_number' => 'N/A',
                'address' => 'N/A',
                'email' => 'itsfaculty@gmail.com',
                'password' => 'Faculty123',
                'user_id' => $userOne->id
            ]
        );
    }
}
