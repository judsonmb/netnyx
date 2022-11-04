<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'  => 'Fulano de Tal',
            'role' => 'admin',
            'email' => 'fulano@email.com',
            'password' => '$2a$10$qQCZKvE6Aqvs7tFIk4aDReZYTqb3X0GPYsWQWLd/sqnld0HXlS1kO', //12345678
        ]);

        DB::table('users')->insert([
            'name'  => 'Beltrano de Tal',
            'role' => 'customer',
            'email' => 'beltrano@email.com',
            'password' => '$2a$10$qQCZKvE6Aqvs7tFIk4aDReZYTqb3X0GPYsWQWLd/sqnld0HXlS1kO', //12345678
        ]);

        DB::table('users')->insert([
            'name'  => 'Ciclano de Tal',
            'role' => 'customer',
            'email' => 'ciclano@email.com',
            'password' => '$2a$10$qQCZKvE6Aqvs7tFIk4aDReZYTqb3X0GPYsWQWLd/sqnld0HXlS1kO', //12345678
        ]);
    }
}
