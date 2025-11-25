<?php

namespace Database\Seeders;

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
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@fobsdev.com',
            'password' => bcrypt('password123')
        ]);

        // Seed portfolio items
        $this->call([
            PortfolioItemSeeder::class,
        ]);
    }
}
