<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            'Tajikistan',
            'Canada',
            'Switzerland',
        ];

        foreach ($array as $arr) {
            DB::table('countries')->insert([
                'name' => $arr,
            ]);
        }
    }
}
