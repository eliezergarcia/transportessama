<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'first_name' => 'Eliezer',
            'last_name' => 'Hernández',
            'user_name' => 'eliezerhdz',
            'email' => '2dcc.eh@gmail.com',
            'password' => 'Eligar07',
            'password_encrypted' => 'Eligar07',
            'avatar' => '',
            'contact_phone' => '8129368475',
            'birthday_date' => '1995/07/31',
        ]);

        /*User::create([
            'first_name' => 'Luis',
            'last_name' => 'Salazar',
            'user_name' => 'luissalazar',
            'email' => 'albertosg@transportessama.com',
            'password' => 'albertosg',
            'password_encrypted' => 'albertosg',
            'avatar' => ''
        ]);*/

    }
}

