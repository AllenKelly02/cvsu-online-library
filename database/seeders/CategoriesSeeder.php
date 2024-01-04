<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "10th",
            "1st ed.",
            "2nd",
            "2nd ed.",
            "3rd",
            "4th ed.",
            "5th",
            "5th ed.",
            "6th",
            "8th ed.",
            "9th",
            "Agriculture sciences, life sciences and biosciences",
            "Arts",
            "Basic and applied sciences",
            "BSCS-Thesis",
            "Business Management",
            "Criminology",
            "Education",
            "Ethics",
            "Fiction/Non-Fiction",
            "Filipiniana",
            "Gender-Focused",
            "General Education",
            "General reference books",
            "Geography",
            "History",
            "History: America",
            "Hotel and Restaurant Management",
            "Humanities",
            "ICT in Education",
            "Information Technology",
            "Language",
            "Law, criminology and forensics",
            "Logic",
            "Management",
            "Philosophy",
            "Psychology",
            "Religion",
            "Research Book",
            "Reserve",
            "Science",
            "Science and Technology",
            "Science-Mathematics",
            "Social Science",
            "Social Science and Humanities",
            "Social Science-Business",
            "Social Sciences",
            "Sociology",
            "Technology",
            "Thesis-BSBM",
            "Thesis-BSIT",
            "Tourism and hotel management",
            "Travel Guide Book",
            "Values",
            "vol. 2",
            "Women's Studies LGBT Gender Studies Feminism"
        ];

        collect($data)->map(function($item){
            Categories::create([
                'name' => $item
            ]);
        });
    }
}
