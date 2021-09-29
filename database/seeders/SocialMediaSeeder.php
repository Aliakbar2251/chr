<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_medias')->insert([
            'link' => 'https://laravel.com/docs/8.x',
            'name' => 'Telegram',
            'contractor_id' => '1'

        ]);
    }
}
