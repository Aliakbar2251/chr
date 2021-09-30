<?php

namespace Database\Seeders;

use App\Models\Address;
use Database\Factories\AddressFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('addresses')->insert([
//            'body' => 'Norak',
//            'is_main' => '1',
//            'description' => 'Consectetur quia quisquam itaque amet ut.',
//            'contractor_id' => '1'
//        ]);
        Address::factory(2)->create();
    }
}
