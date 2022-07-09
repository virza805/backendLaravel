<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Footer;
use App\Models\FooterTop;
use App\Models\Slider;
use App\Models\User;
use Database\Seeders\Categories as SeedersCategories;
use Database\Seeders\Footer as SeedersFooter;
use Database\Seeders\FooterTop as SeedersFooterTop;
use Database\Seeders\Slider as SeedersSlider;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();UserRole::truncate();
        Footer::truncate();
        FooterTop::truncate();
        Categories::truncate();
        Slider::truncate();

        $this->call([
            SeedersFooter::class,
            SeedersFooterTop::class,
            SeedersCategories::class,
            SeedersSlider::class,
        ]);

        User::insert([
            'name' => 'Tanvir',
            'email' => 'virza.bd@gmail.com',
            'role' => 1,
            'password' => bcrypt('12345678'),
        ]);
        User::insert([
            'name' => 'Tanzil',
            'email' => 'admin@gmail.com',
            'role' => 2,
            'password' => bcrypt('12345678'),
            // 'password' => Hash::make('12345678'),
        ]);
    }
}
