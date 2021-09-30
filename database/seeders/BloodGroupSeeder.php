<?php

namespace Database\Seeders;

use App\Models\BloodGroup;
use App\Models\Contractor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $array = [
            '0(|)Rh+',
            '0(||)Rh+',
            '0(|||)Rh+',
            '0(|V)Rh+',
        ];

        foreach ($array as $arr) {
            DB::table('blood_groups')->insert([
                'type' => $arr,
            ]);
        }
    }
}
