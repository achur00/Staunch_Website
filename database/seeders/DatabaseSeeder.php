<?php

namespace Database\Seeders;

use App\Models\MobileDev;
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
        // \App\Models\User::factory(10)->create();
        $this->call([
         SessionYearSeeder::class,
         EnrolStudentSeeder::class,
         CourseDetailSeeder::class,
         MobileDevSeeder::class,  
        ]);
    }
}
