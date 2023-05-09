<?php

namespace Database\Seeders;

use App\Models\Role;
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
                'role_id' => Role::where('name', 'Admin')->first()->id,
                'password' => bcrypt('adminpass'),
            ],
            [
                'name' => 'Editor',
                'email' => 'editor@example.com',
                'role_id' => Role::where('name', 'Editor')->first()->id,
                'password' => bcrypt('cmanager123'),
            ],
            [
                'name' => 'Chief Editor',
                'email' => 'chiefr@example.com',
                'role_id' => Role::where('name', 'Chief-editor')->first()->id,
                'password' => bcrypt('chiefrpass'),
            ],
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'role_id' => Role::where('name', 'User')->first()->id,
                'password' => bcrypt('userpass'),
            ]
        ];

        foreach ($users as $user) {
            User::factory()->create($user);
        }
    }
}
