<?php

namespace Database\Seeders;

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
        DB::table('user_profile')->insert(
            [
                'last_name' => 'Baluyut',
                'first_name'  => 'Allen',
                'middle_name' => 'Canon',
                'student_id' => '09991234',
                'gender' => 'Male',
                'street' => 'street 1',
                'village' => 'village 1',
                'municipality' => 'muni',
                'province' => 'cavite',
                'zip_code' => '1234'
            ]
        );

        DB::table('user_profile')->insert(
            [
                'last_name' => 'Condes',
                'first_name'  => 'Gia',
                'middle_name' => 'Secret',
                'student_id' => '09991234',
                'gender' => 'Female',
                'street' => 'street 1',
                'village' => 'village 1',
                'municipality' => 'muni',
                'province' => 'cavite',
                'zip_code' => '1234'
            ]
        );

        DB::table('users')->insert(
            [
                'name' => 'Allen Kelly Baluyut',
                'email' => 'allen@email.com',
                'password' => Hash::make('allen123'),
                'role' => 'admin',
                'profile_id' => 1,
            ]
        );

        DB::table('users')->insert(
            [
                'name' => 'Gia Nina Condes',
                'email' => 'gia@email.com',
                'password' => Hash::make('gia123'),
                'role' => 'user',
                'profile_id' => 2,
            ]
        );

    }
}