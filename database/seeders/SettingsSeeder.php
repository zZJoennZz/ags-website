<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        SiteSetting::create([
            'full_address' => '3rd Floor Unit 324 Doña Consolacion Buidling, General Santos Street, Quezon City, Philippines, 1109',
            'phone_number' => '0917 544 8886',
            'email_address' => 'alphalinkglobalsolutions@yahoo.com',
            'twitter_url' => '#',
            'facebook_url' => '#',
            'rss_url' => '#',
            'who_are_we_text' => 'Alphalink Global Solutions was established to help skilled applicants to be employment ready and introduce them to the best job option suited to their qualification.',
        ]);
    }
}
