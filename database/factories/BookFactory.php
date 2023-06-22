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
        $categories = ['e-book', 'book', 'thesis', 'journal'];
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

        return [
            'title' => $this->faker->sentence(),
            'author' => $this->faker->name(),
            'category' => $this->faker->randomElement($categories),
            'published_year' => $this->faker->year(),
            'publisher' => $this->faker->company(),
            'accession_number' => $this->faker->unique()->numberBetween(100000, 999999),
            'edition_number' => $this->faker->randomDigit(),
            'call_number' => $this->faker->randomLetter() . $this->faker->randomNumber(3),
            'ISBN' => $this->faker->unique()->isbn13(),
            'pages' => $this->faker->numberBetween(50, 1000),
            'description' => $this->faker->paragraph(),
            'bibliography' => $this->faker->sentence(),
            'course' => $this->faker->randomElement($course),
            'course_id' => $this->faker->numberBetween(1, 7),
        ];
    }
}
