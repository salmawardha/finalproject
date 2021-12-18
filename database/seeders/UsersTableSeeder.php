<?php

namespace Database\Seeders;

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
        \App\Models\User::create([
            'name' => 'Salma K',
            'username' => 'salma',
            'password' => bcrypt('24Oktober'),
            'email' => 'salmamikrotik@gmail.com',
        ]);
    }
}
