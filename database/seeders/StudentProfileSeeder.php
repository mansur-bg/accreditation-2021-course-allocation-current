<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class StudentProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $filename='student_profiles.json';
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
//                    \App\Models\StudentProfile::insert($item);
//                }
        $profile = DB::connection('mybuk_ug')->select(query: "select tblprofile.* from tblprofile inner join tblstudents t on (tblprofile.student_id = t.student_id and t.programme_id=60)");

        $data = json_decode(json_encode($profile), TRUE);
        foreach ($data as $item) {
            foreach ($item as $key => $value) {
                if ($value === "NULL")
                    $item[$key] = NULL;
            }
            $item['created_at'] = $item['updated_at'] = now()->format('Y-m-d H:i:s');
            $item['deleted_at'] = NULL;
            \App\Models\StudentProfile::insert($item);
        }

    }
}
