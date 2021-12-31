<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class StudentRegisteredCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $filename='student_registered_courses.json';
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
//                    \App\Models\StudentRegisteredCourse::insert($item);
//                }

        $registered_courses = DB::connection('mybuk_ug')->select(query: "select tblstdreg.* from tblstdreg inner join (tblstudents) on (tblstudents.regno=tblstdreg.regno and tblstudents.programme_id=60 and tblstdreg.academic_session in ('2017/2018','2018/2019', '2019/2020', '2020/2021'))");

        $data = json_decode(json_encode($registered_courses), TRUE);
        foreach ($data as $item) {
            foreach ($item as $key => $value) {
                if ($value === "NULL")
                    $item[$key] = NULL;
            }
            $item['created_at'] = $item['updated_at'] = now()->format('Y-m-d H:i:s');
            $item['deleted_at'] = NULL;
            \App\Models\StudentRegisteredCourse::insert($item);
        }
    }
}
