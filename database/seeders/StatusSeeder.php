<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ApplicantStatus;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ApplicantStatus::create([
            'description' => 'New',
            'is_delete' => 0,
            'added_by' => 1,
        ]);
    }
}
