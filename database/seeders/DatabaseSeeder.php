<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\BloodGroup;
use App\Models\Country;
use App\Models\Nationality;
use App\Models\Phone;
use App\Models\SocialMedia;
use App\Models\TaxIdentifier;
use App\Models\User;
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
        $this->call(BloodGroupSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(TaxIdentifierSeeder::class);
        $this->call(SocialMediaSeeder::class);
        $this->call(PassportSeeder::class);
        $this->call(NationalitySeeder::class);
        $this->call(GenderSeeder::class);

    }
}
