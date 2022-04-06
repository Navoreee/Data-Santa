<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_list=[
            ['name' => 'Health'],
            ['name' => 'Economy'],
            ['name' => 'Demography'],
            ['name' => 'Energy'],
            ['name' => 'Education'],
            ['name' => 'Climate Change'],
            ['name' => 'Agriculture'],
            ['name' => 'Transportation']
        ];

        foreach ($data_list as $data) {
            Category::create($data);
        }
    }
}
