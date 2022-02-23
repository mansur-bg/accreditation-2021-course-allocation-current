<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ComputerScienceCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $filename='computer_science_courses.json';
//        $data = file_get_contents(base_path('database/jsons/'.$filename));
//        $computer_science_courses = DB::connection('mybuk_ug')->select(query: "select tblcourses.course_id, tblcourses.coursecode code, tblcourses.title, tblcourses.level, if(sum(IF(tblstdreg.semester = 1, 1, 0)) > sum(IF(tblstdreg.semester = 2, 1, 0)), 1, 2) as semester,  count(distinct tblstdreg.regno) registered_students,  tblstdreg.academic_session from tblstdreg inner join (tblstudents, tblcourses) on (tblstudents.regno= tblstdreg.regno and tblstudents.programme_id=60 and tblstdreg.academic_session in ('2017/2018', '2018/2019', '2019/2020', '2020/2021') and tblcourses.coursecode= tblstdreg.ccode) group by tblcourses.course_id,tblcourses.coursecode,tblcourses.title, tblcourses.level, tblstdreg.academic_session order by tblstdreg.academic_session, semester, tblcourses.level, tblcourses.coursecode");

//        $data = json_decode(json_encode($computer_science_courses), TRUE);
        $filename='computer_science_courses.json';
        $data = file_get_contents(base_path('database/jsons/'.$filename));
        $data = json_decode($data, true);

        foreach ($data as $item) {
            foreach ($item as $key => $value) {
                if ($value === "NULL")
                    $item[$key] = NULL;
            }
            $item['created_at'] = $item['updated_at'] = now()->format('Y-m-d H:i:s');
            $item['deleted_at'] = NULL;
            \App\Models\ComputerScienceCourse::insert($item);
        }
    }
}
