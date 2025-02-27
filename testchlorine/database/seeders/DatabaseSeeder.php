<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'sofia',
            'email' => 'sofia@gmail.com',
            'password' => bcrypt('12345')
        ]);

        User::create([
            'name' => 'lidya',
            'email' => 'lidya@gmail.com',
            'password' => bcrypt('12345')
        ]);

        Category::factory(100)->create();
    }
}
