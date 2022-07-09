<?php

namespace Database\Seeders;

use App\Models\Footer as ModelsFooter;
use Illuminate\Database\Seeder;

class Footer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsFooter::create([
            'user_id' => 1,
            'status' => 1,
            'copy_right' => '2022 Copyright All Reserved by vir-za.com',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fuga, aliquam, nisi velit dicta voluptatibus obcaecati',
            'phone' => '01795815660',
            'email' => 'virza.bd@gmail.com',
            'address' => 'Saver, Dhaka - 1340, Bangladesh.',
            'fb' => 'https://www.facebook.com/virza805',
            'linkedin' => 'https://www.linkedin.com/in/1mdalamin1/',
            'twitter' => 'https://twitter.com/1mdalamin1',
            'instagram' => 'https://www.google.com.bd/maps/@23.851216,90.2821951,16z?hl=en&authuser=0',
            'github' => 'https://github.com/virza805',
            'web' => 'https://vir-za.com/',
        ]);
    }
}
