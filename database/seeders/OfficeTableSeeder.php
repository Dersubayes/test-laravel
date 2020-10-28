<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


use App\Models\Office;

class OfficeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        \App\Models\Office::truncate();

        $faker = \Faker\Factory::create();

        //Populate offices table
        $manypopulate = 50;

        for($i= 0; $i < $manypopulate; $i++){
            \App\Models\Office::create([
            'name' => $faker->sentence,
            'address' => $faker->sentence,
        ]);
    }

    }
}
