<?php

namespace Database\Seeders;

use App\Models\FooterTop as ModelsFooterTop;
use Illuminate\Database\Seeder;

class FooterTop extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsFooterTop::create([
            'user_id' => 1,
            'status' => 1,
            'title' => 'Saturday - Wednesday',
            'description' => '9AM – 5PM',
        ]);
        ModelsFooterTop::create([
            'user_id' => 1,
            'status' => 1,
            'title' => 'Thursday',
            'description' => '9AM – 12PM',
        ]);
        ModelsFooterTop::create([
            'user_id' => 1,
            'status' => 1,
            'title' => 'Friday',
            'description' => 'Closed',
        ]);
        ModelsFooterTop::create([
            'user_id' => 1,
            'status' => 1,
            'title' => 'Support',
            'description' => 'Contact us 24 hours',
        ]);
        ModelsFooterTop::create([
            'user_id' => 1,
            'status' => 1,
            'title' => 'Products',
            'description' => 'Contact us 24 hours',
        ]);
        ModelsFooterTop::create([
            'user_id' => 1,
            'status' => 1,
            'title' => 'Secure Payment',
            'description' => 'Contact us 24 hours',
        ]);
        ModelsFooterTop::create([
            'user_id' => 1,
            'status' => 1,
            'title' => 'Prices & Offers',
            'description' => 'Contact us 24 hours',
        ]);
    }
}
