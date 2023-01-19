<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'account_type' => 'ADMIN',
            'password' => 'admin',
            'is_active' => 1,
            'first_name' => 'Test',
            'last_name' => 'User',
        ]);
    }
}
