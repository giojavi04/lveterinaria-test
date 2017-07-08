<?php

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
        \App\User::create([
        'first_name' => 'Javier',
        'last_name' => 'Montalvo',
        'username' => 'giojavi04',
        'email' => 'admin@lveterinaria.net',
        'password' => bcrypt('secret'),
        'type' => 'admin',
    ]);
    }
}
