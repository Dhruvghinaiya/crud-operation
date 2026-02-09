<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'course_id' => Course::inRandomOrder()->value('id') ?? Course::factory(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'mobile'=>$this->faker->phoneNumber(),
            'dob'=>$this->faker->dateTimeBetween('1995-01-01', '2005-12-31')->format('Y-m-d'),
            'avatar' => null,
            'is_active' => true
        ];
    }
}
