<?php

namespace Modules\Employee\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Employee\app\Models\JobapplicationModel;
use Modules\Employee\app\Models\Job;
use Modules\Employee\app\Models\UserEmployee;

class EmployeeDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            UserEmployeeSeeder::class,
            SeedTableJobsSeeder::class,
            SeedTableJobapplySeeder::class,
        ]);
    }
}
