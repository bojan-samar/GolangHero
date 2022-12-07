<?php

namespace Database\Seeders;

use App\Models\Forum\Forum;
use App\Models\Job;
use App\Models\JobPost;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(UserSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(JobImportSeeder::class);
        JobPost::factory()->count(50)->create();

        //Factories
//         \App\Models\Company::factory(10)->create();
//         Forum::factory(10)->create();
//         Vehicle::factory(10)->create();
    }
}
