<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Phone;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phones')->insert([
            'body' => '00001',
            'comment' => 'Ismat Ismat',
            'is_main' => '1',
            'contractor_id' => '7'
        ]);
    }
}
