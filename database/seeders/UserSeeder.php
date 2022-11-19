<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $faker = Faker::create();

        DB::table('users')->insert([
            [
                'name' => 'Superadmin',
                'username' => "superadmin",
                'uuid' => 'dd04133a-7d52-4ceb-92e2-00518873f792',
                'email' => 'superadmin@app.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'superadmin',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Admin',
                'username' => "admin",
                'uuid' => Str::uuid(),
                'email' => 'admin@app.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Subscriber',
                'username' => "subscriber",
                'uuid' => Str::uuid(),
                'email' => 'subscriber@app.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'subscriber',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
