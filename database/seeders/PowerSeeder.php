<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $powers = [
            [
                'name' => "HP",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'name' => "Attack",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'name' => "Def",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'name' => "Speed",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ];

        \DB::table('powers')->insert($powers);
    }
}
