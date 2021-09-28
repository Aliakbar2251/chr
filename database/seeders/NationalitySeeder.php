<?php

namespace Database\Seeders;

use App\Models\Nationality ;
use Illuminate\Database\Seeder;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            'Tajik',
            'Russian'

        ];

        foreach ($array as $arr) {
            Nationality::query()->create([
                'type' => $arr,
            ]);
        }
    }
}
