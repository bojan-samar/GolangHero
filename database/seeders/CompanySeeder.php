<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        DB::table('companies')->insert([
            [
                'user_id' => 1,
                'name' => 'Knight Transportation',
                'slug' => 'knight-transportation',
                'url' => 'https://www.knighttrans.com/',
                'phone' => '123-345-6789',
                'location' => 'Phoenix, AZ',
                'description' => "Knight Transportation is part of North America's largest truckload fleet, providing multiple truckload services with industry leading safety, service, and financial returns.",
                'status' => 1
            ],
        ]);
    }
}
