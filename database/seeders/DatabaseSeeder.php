<?php

namespace Database\Seeders;

use App\Models\BugReport;
use App\Models\Test;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Test User',
            'last_name' => 'Test User Holsters',
            'email' => 'test@example.com',
        ]);

        Test::factory(30)->create();
        BugReport::factory(10)->create();

    }
}
