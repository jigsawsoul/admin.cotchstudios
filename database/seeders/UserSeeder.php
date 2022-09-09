<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'first_name' => 'Richard',
                'last_name' => 'Howse',
                'phone_number' => '+44 7852 780306',
                'email' => 'dev@cotchstudios.co.uk',
                'password' => bcrypt('1qw+RTY1'),
                'administrator' => true,
                'marketing_email' => true,
                'marketing_sms' => true,
            ],
            [
                'first_name' => 'Saheed',
                'last_name' => 'Abdul',
                'phone_number' => '+44 7843 707636',
                'email' => 'saheed@cotchstudios.co.uk',
                'password' => bcrypt('C0tch2021'),
                'administrator' => true,
                'marketing_email' => true,
                'marketing_sms' => true,
            ],
            [
                'first_name' => 'Elliott',
                'last_name' => 'Nelson',
                'phone_number' => '+44 7446 905780',
                'email' => 'elliott@cotchstudios.co.uk',
                'password' => bcrypt('C0tch2021'),
                'administrator' => true,
                'marketing_email' => true,
                'marketing_sms' => true,
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
