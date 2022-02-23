<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StaffAllocationAccreditationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filename='staff_allocation_accreditations.json';
                $data = file_get_contents(base_path('database/jsons/'.$filename));

                $data = json_decode($data, true);
                foreach ($data as $item) {
                    foreach ($item as $key => $value) {
                        if ($value === "NULL")
                            $item[$key] = NULL;
                    }
                    $item['created_at'] = $item['updated_at'] = now()->format('Y-m-d H:i:s');
                    $item['deleted_at'] = NULL;
                    \App\Models\StaffAllocationAccreditation::insert($item);
                }
    }
}
