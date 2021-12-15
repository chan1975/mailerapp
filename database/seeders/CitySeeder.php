<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert(
            [[
                'state_id' => 1,
                'name' => 'Cuenca',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'state_id' => 1,
                'name' => 'Llacao',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'state_id' => 2,
                'name' => 'Guaranda',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'state_id' => 3,
                'name' => 'La Troncal',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'state_id' => 3,
                'name' => 'Azogues',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'state_id' => 4,
                'name' => 'Tulcán',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'state_id' => 4,
                'name' => 'San Gabriel',
                'created_at' => now(),
                'updated_at' => now()
            ]]
        );
    }
}
