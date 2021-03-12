<?php

namespace Database\Seeders;

use App\Models\Cost;
use App\Models\Team;
use App\Models\User;
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
        User::factory()->create();
        Team::factory()->create();
        Cost::factory()->create();
        $this->call(PageTableSeeder::class);
        $this->call(DeadlineTableSeeder::class);
        $this->call(DisciplineTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
    }
}
