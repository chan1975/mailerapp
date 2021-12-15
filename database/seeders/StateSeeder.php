<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert(
            [[
                'country_id' => 1,
                'name' => 'Azuay',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'country_id' => 1,
                'name' => 'Bolívar',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'country_id' => 1,
                'name' => 'Cañar',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'country_id' => 1,
                'name' => 'Carchi',
                'created_at' => now(),
                'updated_at' => now()
            ]]
        );
    }
}
