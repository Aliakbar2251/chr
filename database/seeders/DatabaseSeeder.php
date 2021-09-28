<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Nationality;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ContractorSeeder::class);
        $this->call(PhoneSeeder::class);
        $this->call(AddressSeeder::class);
    }
}
