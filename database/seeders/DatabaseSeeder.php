<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    //use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'username' => Str::slug('Test User'),
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );

        $categories = [
            'Technology',
            'Health',
            'Science',
            'Sports',
            'Politics',
            'Entertainment',
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate([
                'name' => $category,
            ]);
        }

        // // Ensure there are some additional users for posts
        // if (User::count() < 5) {
        //     User::factory()->count(5 - User::count())->create();
        // }

        // // Create posts only if none exist to keep seeding idempotent
        // if (Post::count() === 0) {
        //     Post::factory(100)->create();
        // }

    }
}
