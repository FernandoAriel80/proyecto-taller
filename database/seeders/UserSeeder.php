<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Fernando Orellana',
                'email' => 'orellanaariel312@gmail.com',
                'password' =>  bcrypt('12345678'),
                'dni' => '12345678',
                'phone_number' => '1122334455',
                'role' => 'admin',
            ],
        ];
        DB::table('users')->insert($users);
    }
}
