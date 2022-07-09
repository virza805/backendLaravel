<?php

namespace Database\Seeders;

use App\Models\Slider as ModelsSlider;
use Illuminate\Database\Seeder;

class Slider extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ModelsSlider::create([
            'user_id' => 1,
            'status' => 1,
            'title' => 'Bengal Vegetable farm Organic 100%',
            'sub' => 'Save up 50% off',
            'des' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fuga ?',
            'btn' => 'Buy Now',
            'btn_link' => '#',
            'use' => '0',
        ]);
        ModelsSlider::create([
            'user_id' => 1,
            'status' => 1,
            'title' => 'Bengal Fresh Fruits farm Organic 100%',
            'sub' => 'Save up 30% off',
            'des' => 'Wpsum dolor sit amet consectetur adipisicing elit. Itaque fuga ?',
            'btn' => 'Order Now',
            'btn_link' => '#',
            'use' => '0',
        ]);
        ModelsSlider::create([
            'user_id' => 1,
            'status' => 1,
            'title' => 'Grocery item Collection farm Organic 100%',
            'sub' => 'Save up 70% off',
            'des' => 'Rsit amet consectetur adipisicing elit. Itaque fuga ?',
            'btn' => 'Shop Now',
            'btn_link' => '#',
            'use' => '0',
        ]);
        ModelsSlider::create([
            'user_id' => 1,
            'status' => 1,
            'title' => 'Fresh Vegetable Collection',
            'sub' => 'Buy 1 Get 2',
            'des' => '9AM – 5PM',
            'btn' => 'Call Now',
            'btn_link' => 'tel:01795815660',
            'use' => 1,
        ]);
        ModelsSlider::create([
            'user_id' => 1,
            'status' => 1,
            'title' => 'Fresh Fruits Collection',
            'sub' => 'Buy 1 Get 1',
            'des' => '9AM – 5PM',
            'btn' => 'Order Now',
            'btn_link' => '#',
            'use' => 1,
        ]);
    }
}
