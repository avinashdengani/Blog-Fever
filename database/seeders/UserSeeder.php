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
        User::create([
            'name' => 'Avinash Dengani',
            'email' => 'avinashdengani123@gmail.com',
            'password' => Hash::make('Avinash@123')
        ]);

        User::create([
            'name' => 'Yash Dengani',
            'email' => 'yashdengani123@gmail.com',
            'password' => Hash::make('Yash@123')
        ]);
    }
}
