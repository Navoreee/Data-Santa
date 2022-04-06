<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role 1 = admin, Role 0 = member
        $data_list=[
            ['name' => 'John Doe',
            'email' => 'john_doe@gmail.com',
            'password' => Hash::make('johndoe'),
            'role' => 0],
            ['name' => 'Jane Doe',
            'email' => 'jane_doe@gmail.com',
            'password' => Hash::make('janedoe'),
            'role' => 0],
            ['name' => 'Administrator',
            'email' => 'Admin@gmail.com',
            'password' => Hash::make('administrator'),
            'role' => 1]
        ];

        foreach ($data_list as $data) {
            User::create($data);
        }
    }
}
