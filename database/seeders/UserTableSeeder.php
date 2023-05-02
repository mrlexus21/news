<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'role_id' => 1,
                'password' => bcrypt('adminpass'),
            ],
            [
                'name' => 'Editor',
                'email' => 'editor@example.com',
                'role_id' => 2,
                'password' => bcrypt('cmanager123'),
            ],
            [
                'name' => 'Chief Editor',
                'email' => 'chiefr@example.com',
                'role_id' => 3,
                'password' => bcrypt('chiefrpass'),
            ],
        ];

        foreach ($users as $user) {
            User::factory()->create($user);
        }
    }
}
