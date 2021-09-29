<?php

namespace Database\Seeders;

use App\Models\Nationality;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            DB::table('nationalities')->insert([
                'type' => $arr,
            ]);
        }

    }
}
