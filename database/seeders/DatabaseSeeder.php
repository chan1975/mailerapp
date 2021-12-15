<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

       

        $this->call([
            RoleSeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            CitySeeder::class
        ]);

        DB::table('users')->insert([
            [
                'name' => Str::random(10),
                'role_id' => 1,
                'email' => 'testadmin@gmail.com',
                'password' => Hash::make('password'),
                'cell' => '09999999999',
                'cedula' => '1111111111',
                'date_birth' => now(),
                'city' => 'Cuenca',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => Str::random(10),
                'role_id' => 2,
                'email' => 'testuser@gmail.com',
                'password' => Hash::make('password'),
                'cell' => '09999999999',
                'cedula' => '1111111111',
                'date_birth' => now(),
                'city' => 'San Gabriel',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
