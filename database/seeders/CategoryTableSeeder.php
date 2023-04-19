<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Политика',
                'slug' => 'politics',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Экономика',
                'slug' => 'economy',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Общество',
                'slug' => 'society',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Наука',
                'slug' => 'science',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Культура',
                'slug' => 'culture',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Спорт',
                'slug' => 'sport',
                'created_at' => Carbon::now(),
            ]
        ]);
    }
}
