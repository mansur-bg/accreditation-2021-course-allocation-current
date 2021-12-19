<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $filename='courses.json';
//                $data = file_get_contents(base_path('database/jsons/'.$filename));
//
//                $data = json_decode($data, true);
//                foreach ($data as $item) {
//                    foreach ($item as $key => $value) {
//                        if ($value === "NULL")
//                            $item[$key] = NULL;
//                    }
//                    $item['created_at'] = $item['updated_at'] = now()->format('Y-m-d H:i:s');
//                    $item['deleted_at'] = NULL;
//                    \App\Models\Course::insert($item);
//                }
        $courses = DB::connection('mybuk_ug')->select(query: "select course_id as id, coursecode code, title, credit, level, semester, status, prerequisite, corequisite, remark, Faculty_id as faculty_id, Faculty as faculty, Department_id as department_id, Department as department, Programme_id as programme_id, Programme as programme, iscentralised from tblcourses");

        $data = json_decode(json_encode($courses), TRUE);
        foreach ($data as $item) {
            foreach ($item as $key => $value) {
                if ($value === "NULL")
                    $item[$key] = NULL;
            }
            $item['created_at'] = $item['updated_at'] = now()->format('Y-m-d H:i:s');
            $item['deleted_at'] = NULL;
            \App\Models\Course::insert($item);
        }
    }
}
