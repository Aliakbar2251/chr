<?php

namespace Database\Factories;

use App\Models\Phone;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Phone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //dd($this->faker->idN(1,5));
        $values = array();
        for ($i = 0; $i < 10; $i++) {
            // get a random digit, but always a new one, to avoid duplicates
            $values []= $faker->unique()->randomDigit;
        }
        return [
            'body' => $this->faker->phoneNumber,
            'comment' => $this->faker->text,
            'is_main' => $this->faker->boolean,

            'contractor_id' =>$this->faker->numberBetween()
        ];
    }
}
