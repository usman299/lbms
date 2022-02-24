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
        \App\Settings::create([
            'logo' => 'img_2.png',
            'footer' => 'Contact in any instance where it is required to cross-validate on 0333 772 1118

Expert Doctors is a trading name for Expert Doctors Limited
UKAS Number: 23260 LAB UKAS Number: 306801 0333 772 1118 info@expertdoctors.com www.expertdoctors.com'
        ]);
    }
}
