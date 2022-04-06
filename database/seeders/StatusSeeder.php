<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_list=[
            ['name' => 'Pending'],
            ['name' => 'Published'],
            ['name' => 'Rejected']
        ];

        foreach ($data_list as $data) {
            Status::create($data);
        }
    }
}
