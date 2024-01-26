<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            'Bachelor of Secondary Education',
            'BS Business Management',
            'BS Computer Science',
            'BS Criminology',
            'BS Hospitality Management',
            'BS Information Technology',
            'BS Psychology',
            'Non-specific'
        ];



        collect($courses)->map(function($course){
            Course::create([
                'name' => $course
            ]);
        });
    }
}
