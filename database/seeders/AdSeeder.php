<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdSeeder extends Seeder
{
    use WithFaker;

    protected $storage = 'app/public/images';

    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $storagePath = storage_path($this->storage);

        if (!File::exists($storagePath)) {
            File::makeDirectory($storagePath, 0755, true);
        }

        DB::table('ads')->insert([
            [
                'name' => 'Header',
                'link' => '/',
                'type' => 'header',
                'image' => $faker->image(storage_path($this->storage), 728, 90, 'abstract', false, true),
                'showdate_start' => Carbon::now(),
                'showdate_end' => $faker->dateTimeBetween('now', '+2 months'),
            ],
            [
                'name' => 'side',
                'link' => '/',
                'type' => 'side',
                'image' => $faker->image(storage_path($this->storage), 255, 293, 'abstract', false, true),
                'showdate_start' => Carbon::now(),
                'showdate_end' => $faker->dateTimeBetween('now', '+2 months'),
            ],
        ]);
    }
}
