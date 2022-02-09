<?php

use Illuminate\Database\Seeder;
use App\User;
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
            'fname' => "Admin",
            'lname' => "Admin",
            'email' => "admin@gmail.com",
            'role' => '0',
            'password' => bcrypt('password'),

        ]);
        User::create([
            'fname' => "Lab",
            'lname' => "attendent",
            'email' => "lab@gmail.com",
            'role' => '1',
            'password' => bcrypt('password'),

        ]);
        User::create([
            'fname' => "Patient",
            'lname' => "",
            'email' => "user@gmail.com",
            'role' => '2',
            'password' => bcrypt('password'),

        ]);
    }
}
