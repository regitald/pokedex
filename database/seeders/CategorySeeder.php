<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => "Leaf Monster",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'name' => "Diving Monster",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'name' => "Lizard Monster",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'name' => "Hero Monster",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],

        ];

        \DB::table('categories')->insert($categories);
    }
}
