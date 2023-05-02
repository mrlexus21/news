<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Chief-editor'],
            ['name' => 'Editor']
        ];

        foreach ($roles as $role) {
            $role['created_at'] = Carbon::now();
            $role['updated_at'] = Carbon::now();

            DB::table('roles')->insert($role);
        }
    }
}
