<?php

namespace Database\Factories;

use App\Models\Office;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OfficeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Office::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    
    public function definition()
    {
        $faker = \Faker\Factory::create();
        
        return [
            'name' => $faker->sentence,
            'address' => $faker->sentence,
        ];
    }
}
