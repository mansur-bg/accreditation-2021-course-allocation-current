<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StaffProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filename='xxx.json';
                $data = file_get_contents(base_path('database/jsons/'.$filename));

                $data = json_decode($data, true);
                foreach ($data as $item) {
                    foreach ($item as $key => $value) {
                        if ($value === "NULL")
                            $item[$key] = NULL;
                    }
                    $item['created_at'] = $item['updated_at'] = now()->format('Y-m-d H:i:s');
                    $item['deleted_at'] = NULL;
                    \App\Models\XXX::insert($item);
                }
    }
}
