<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => "Grass",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'name' => "Psychic",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'name' => "Flying",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'name' => "Fire",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'name' => "Dragon",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ];

        \DB::table('types')->insert($types);
    }
}
