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
        \LVeterinaria\User::create([
        'first_name' => 'Jason',
        'last_name' => 'Martinez',
        'username' => 'jmartinez',
        'email' => 'admin@lveterinaria.net',
        'password' => bcrypt('secret'),
        'type' => 'admin',
    ]);
    }
}
