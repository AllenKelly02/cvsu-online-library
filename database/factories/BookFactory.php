<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = [
            'audio',
            'book',
            'e-Book',
            'e-Journal',
            'journal',
            'clippings',
            'other',
            'publications',
            'references',
            'software',
            'thesis'
        ];

        $course = [
            'Bachelor of Secondary Education',
            'BS Business Management',
            'BS Computer Science',
            'BS Criminology',
            'BS Hospitality Management',
            'BS Information Technology',
            'BS Psychology',
            'Non-specific'
        ];
        $category = [
            '10th',
            '1st ed.',
            '2nd',
            '2nd ed.',
            '3rd',
            '4th ed.',
            '5th',
            '5th ed.',
            '6th',
            '8th ed.',
            '9th',
            'Agriculture sciences, life sciences and biosciences',
            'Arts',
            'Basic and applied sciences',
            'BSCS-Thesis',
            'Business Management',
            'Criminology',
            'Education',
            'Ethics',
            'Fiction/Non-Fiction',
            'Filipiniana',
            'Gender-Focused',
            'General Education',
            'General reference books',
            'Geography',
            'History',
            'History: America',
            'Hotel and Restaurant Management',
            'Humanities',
            'ICT in Education',
            'Information Technology',
            'Language',
            'Law, criminology and forensics',
            'Logic',
            'Management',
            'Philosophy',
            'Psychology',
            'Religion',
            'Research Book',
            'Reserve',
            'Science',
            'Science and Technology',
            'Science-Mathematics',
            'Social Science',
            'Social Science and Humanities',
            'Social Science-Business',
            'Social Sciences',
            'Sociology',
            'Technology',
            'Thesis-BSBM',
            'Thesis-BSIT',
            'Tourism and hotel management',
            'Travel Guide Book',
            'Values',
            'vol. 2',
            'Womens Studies LGBT Gender Studies Feminism'
        ];

        return [
            'title' => $this->faker->unique()->sentence(3),
            'author' => $this->faker->name(),
            'type' => $this->faker->randomElement($type),
            'category' => $this->faker->randomElement($category),
            'published_year' => $this->faker->year(),
            'publisher' => $this->faker->company(),
            'accession_number' => $this->faker->unique()->numberBetween(100000, 999999),
            'edition_number' => $this->faker->randomDigit(),
            'call_number' => $this->faker->randomLetter() . $this->faker->randomNumber(3),
            'ISBN' => $type === 'thesis' ? 'none' : $this->faker->unique()->isbn13(),
            'pages' => $this->faker->numberBetween(50, 1000),
            'description' => $this->faker->sentence(),
            'bibliography' => $this->faker->sentence(),
            'course' => $this->faker->randomElement($course),
            'course_id' => $this->faker->numberBetween(1, 7),
        ];
    }
}
