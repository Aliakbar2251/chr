<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Contractor;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'body'=>$this->faker->address,
            'is_main'=>$this->faker->boolean,
            'description'=>$this->faker->text,
            'contractor_id'=>Contractor::factory(),
        ];
    }
}
