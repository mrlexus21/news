<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
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

        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('adminpass'),
            ],
            [
                'name' => 'Content manager',
                'email' => 'cm@example.com',
                'password' => bcrypt('cmanager123'),
            ],
            [
                'name' => 'Chief Editor',
                'email' => 'chiefr@example.com',
                'password' => bcrypt('chiefrpass'),
            ],
        ];

        foreach ($users as $user) {
            \App\Models\User::factory()->create($user);
        }

        $this->call([
            CategoryTableSeeder::class,
        ]);

        Post::factory(100)->withCleanStorageFolder()->create();
    }
}
