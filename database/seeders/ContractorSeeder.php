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


        $array = [
            'Aslonov Aslon',
            'Ahmad Ahmadov',
            'Ali Akbarov',
        ];

        foreach ($array as $arr) {
            DB::table('contractors')->insert([
                'full_name' => $arr,
            ]);
        }
    }
}
