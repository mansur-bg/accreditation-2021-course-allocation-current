<?php

namespace Database\Seeders;

use App\Models\ComputerScienceCourse;
use App\Models\StudentRegisteredCourse;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AcademicSessionSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(ComputerScienceCourseSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(StudentProfileSeeder::class);
        $this->call(StudentRegisteredCourseSeeder::class);
        $this->call(StaffSeeder::class);

    }
}
