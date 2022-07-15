<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            ['name' => 'Toan', 'count_student_max' => 5],
            ['name' => 'Van', 'count_student_max' => 5],
            ['name' => 'Anh', 'count_student_max' => 5],
        ];

        foreach($courses as $course){
            Course::create($course);
        }
    }
}
