<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PassportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('passports')->insert([
            'name'             => 'Ahmad',
            'surname'          => 'Ahmadov',
            'patronymic'       => 'Ahmadovich',
            'birthday'         => '10.01.2000',
            'is_main'          => '1',
            'blood_group_type' => '0(|)Rh+',
            'national_id'      => '652365',
            'serial_number'    => 'A10121526',
            'gender_type'      => 'Male',
            'contractor_id'    => '9',
            'nationality_id'   => '2',
            'country_id'       => '2'

        ]);
    }
}
