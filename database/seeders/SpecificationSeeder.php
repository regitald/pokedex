<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $variants = [
            [
                'name' => "Height",
                'variant' => "M",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'name' => "Weight",
                'variant' => "KG",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'name' => "Main Color",
                'variant' => "Black",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ]
        ];

        \DB::table('specifications')->insert($variants);
    }
}
