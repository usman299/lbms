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
            'username' => "admin",
            'email' => "admin@gmail.com",
            'role' => '0',
            'partner' => '1',
            'patients' => '1',
            'add_patients' => '1',
            'users' => '1',
            'password' => bcrypt('password'),
        ]);
    }
}
