<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'fede@mail.com', // Replace with desired name
            'last_name' => 'fede@mail.com', // Replace with desired last name
            'email' => 'fede@mail.com', // Replace with desired email
            'phone' => '1234567890', // Replace with desired phone number
            'company_name' => 'Doe Inc.', // Replace with desired company name
            'cif' => 'CIF12345678', // Replace with desired CIF
            'antiquity' => '5 years', // Replace with desired antiquity
            'annual_billing' => '100000', // Replace with desired annual billing
            'email_verified_at' => now(),
            'password' => Hash::make('fede@mail.com'), // Replace with desired password
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
