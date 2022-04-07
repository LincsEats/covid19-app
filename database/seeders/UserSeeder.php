<?php

namespace Database\Seeders;

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
        $users = [
            [
                "name" => "Admin",
                "niNumber" => "ab123456c",
                "email" => "admin@gmail.com",
                "password" => Hash::make('password'), //Hash the passwords on create otherwise login will be invalid if stored in plain text
            ],
            [
                "name" => "Editor",
                "niNumber" => "ab123456d",
                "email" => "editor@gmail.com",
                "password" =>Hash::make('password'), 
            ],
            [
                "name" => "User",
                "niNumber" => "ab123456e",
                "email" => "user@gmail.com",
                "password" =>Hash::make('password'), 
            ],
        ];

        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }
}