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
            'fname' => "Super",
            'lname' => "Admin",
            'email' => "admin@gmail.com",
            'role' => '0',
            'password' => bcrypt('password'),

        ]);
    }
}
