<?php

namespace Database\Seeders;

use App\Models\Categories as ModelsCategories;
use Illuminate\Database\Seeder;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsCategories::create([
            'user_id' => 1,
            'status' => 1,
            'name' => 'ice cream ',
            'slug' => 1,
        ]);
        ModelsCategories::create([
            'user_id' => 1,
            'status' => 1,
            'name' => 'Stationery ',
            'slug' => 1,
        ]);
        ModelsCategories::create([
            'user_id' => 1,
            'status' => 1,
            'name' => 'Grocery',
            'slug' => 1,
        ]);
        ModelsCategories::create([
            'user_id' => 1,
            'status' => 1,
            'name' => 'Fish',
            'slug' => 1,
        ]);
        ModelsCategories::create([
            'user_id' => 1,
            'status' => 1,
            'name' => 'Grocery',
            'slug' => 1,
        ]);
        ModelsCategories::create([
            'user_id' => 1,
            'status' => 1,
            'name' => 'Fruits',
            'slug' => 1,
        ]);
        ModelsCategories::create([
            'user_id' => 1,
            'status' => 1,
            'name' => 'Vegetable',
            'slug' => 1,
        ]);
        ModelsCategories::create([
            'user_id' => 1,
            'status' => 1,
            'name' => 'Fresh Fruits Collection',
            'slug' => '0',
        ]);
        ModelsCategories::create([
            'user_id' => 1,
            'status' => 1,
            'name' => 'Vegetable Collection',
            'slug' => '0',
        ]);
        ModelsCategories::create([
            'user_id' => 1,
            'status' => 1,
            'name' => 'Grocery Items',
            'slug' => '0',
        ]);
    }
}
