<?php

namespace Database\Seeders;

use App\Models\Contractor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ContractorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Contractor::factory(6)->create();
//        $array = [
//            'Irgashev Ibrofim',
//            'TEshmat ehsmat',
//            'Va gayra',
//        ];
//
//        foreach ($array as $arr) {
//            Contractor::query()->create([
//                'full_name' => $arr,
//            ]);
//        }
    }
}
