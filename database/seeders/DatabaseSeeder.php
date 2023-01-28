<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('customers')->insert([
            'full_name' => 'admin_1',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1234'),
            'is_active' => 1,
            'phone' => '0346027344',
            'address' => 'hai duong',
        ]);
    }
}
