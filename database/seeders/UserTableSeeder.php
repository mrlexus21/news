<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\File;
use Faker\Generator as Faker;

class UserTableSeeder extends Seeder
{
    use WithFaker;

    protected $storage = 'app/public/userimages';

    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $storagePath = storage_path($this->storage);

        if (!File::exists($storagePath)) {
            File::makeDirectory($storagePath, 0755, true);
        }

        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'role_id' => Role::where('name', 'Admin')->first()->id,
                'password' => bcrypt('adminpass'),
                'image' => $faker->image(storage_path($this->storage), 640, 480, 'abstract', false,
                        true),
            ],
            [
                'name' => 'Editor',
                'email' => 'editor@example.com',
                'role_id' => Role::where('name', 'Editor')->first()->id,
                'password' => bcrypt('cmanager123'),
                'image' => $faker->image(storage_path($this->storage), 640, 480, 'abstract', false,
                    true),
            ],
            [
                'name' => 'Chief Editor',
                'email' => 'chiefr@example.com',
                'role_id' => Role::where('name', 'Chief-editor')->first()->id,
                'password' => bcrypt('chiefrpass'),
                'image' => $faker->image(storage_path($this->storage), 640, 480, 'abstract', false,
                    true),
            ],
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'role_id' => Role::where('name', 'User')->first()->id,
                'password' => bcrypt('userpass'),
                'image' => $faker->image(storage_path($this->storage), 640, 480, 'abstract', false,
                    true),
            ],
            [
                'name' => 'Editor 2',
                'email' => 'editor2@example.com',
                'password' => bcrypt('cmanager123'),
                'role_id' => Role::where('name', 'Editor')->first()->id,
                'image' => $faker->image(storage_path($this->storage), 640, 480, 'abstract', false,
                        true),
            ],
            [
                'name' => 'Editor 3',
                'email' => 'editor3@example.com',
                'password' => bcrypt('cmanager123'),
                'role_id' => Role::where('name', 'Editor')->first()->id,
                'image' => $faker->image(storage_path($this->storage), 640, 480, 'abstract', false,
                        true),
            ],
        ];

        foreach ($users as $user) {
            User::factory()->create($user);
        }
    }
}
