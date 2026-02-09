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
            ['name' => 'Web Development', 'description' => 'Learn full web stack'],
            ['name' => 'Laravel Mastery', 'description' => 'Laravel from zero to pro'],
            ['name' => 'PHP Basics', 'description' => 'Core PHP fundamentals'],
            ['name' => 'Full Stack Development', 'description' => 'Frontend + Backend'],
            ['name' => 'React Fundamentals', 'description' => 'React from scratch'],
            ['name' => 'Database Design', 'description' => 'DB modeling & SQL'],
            ['name' => 'API Development', 'description' => 'REST & API design'],
        ];

        foreach ($courses as $course) {
            Course::firstOrCreate(
                ['name' => $course['name']],
                ['description' => $course['description']]
            );
        }
    }
}
