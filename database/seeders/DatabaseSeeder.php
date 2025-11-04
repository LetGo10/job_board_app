<?php

namespace Database\Seeders;

use App\Models\Job;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Job::factory(50)->create();

        /*User::factory()->create([
            'name' => 'syuhada',
            'email' => 'syuhada@example.com',
        ]);*/

                // Buat user admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        // Buat user employer
        User::create([
            'name' => 'Employer User',
            'email' => 'employer@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'employer',
        ]);

        // Buat user author
        User::create([
            'name' => 'Author User',
            'email' => 'author@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'author',
        ]);

        //User::factory(10)->create();
    }
}
