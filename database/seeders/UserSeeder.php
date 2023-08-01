<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate(
            [
                "email" => "admin@m.com",
            ],
            [
                "name" => "admin",
                "email" => "admin@m.com",
                "password" => bcrypt("password"),
            ]
        );

        $user->assignRole("admin");

        $user = User::firstOrCreate(
            [
                "email" => "user@m.com"
            ],
            [
                "name" => "user",
                "email" => "user@m.com",
                "password" => bcrypt("password"),
            ]
        );

        $user->assignRole("user");

        $user = User::firstOrCreate(
            [
                "email" => "user2@m.com"
            ],
            [
                "name" => "user2",
                "email" => "user2@m.com",
                "password" => bcrypt("password"),
            ]
        );

        $user->assignRole("user");

        $user = User::firstOrCreate(
            [
                "email" => "user3@m.com"
            ],
            [
                "name" => "user3",
                "email" => "user3@m.com",
                "password" => bcrypt("password"),
            ]
        );

        $user->assignRole("user");
    }
}
