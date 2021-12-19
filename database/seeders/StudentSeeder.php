<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $filename='students.json';
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
//                    \App\Models\Student::insert($item);
//                }
        $students = DB::connection('mybuk_ug')->select(query: "select student_id as id, regno, matriculation_no, admissionletter_sn, fullname, first_name, middle_name, last_name, email, emailactivated, programme_id, admissionset, result_admissionset, accountactive, std_status, modeofentry, level, category, entrystatus, modeofstudy, academic_session from tblstudents where programme_id=60");
        $data = json_decode(json_encode($students), TRUE);
        foreach ($data as $item) {
            foreach ($item as $key => $value) {
                if ($value === "NULL")
                    $item[$key] = NULL;
            }
            $item['created_at'] = $item['updated_at'] = now()->format('Y-m-d H:i:s');
            $item['deleted_at'] = NULL;
            \App\Models\Student::insert($item);
        }
    }
}
