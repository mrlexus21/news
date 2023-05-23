<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    protected $storage = 'app/public/images';

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = Str::limit($this->faker->realText(), 50);

        $storagePath = storage_path($this->storage);
        if (!File::exists($storagePath)) {
            File::makeDirectory($storagePath, 0755, true);
        }

        return [
            'title' => $title,
            'slug' => Str::slug($title) . random_int(1, 1000),
            'image' => $this->faker->image(storage_path($this->storage), 640, 480, 'abstract', false, true),
            'category_id' => function () {
                return Category::inRandomOrder()->first()->id;
            },
            'user_id' => function () {
                User::inRandomOrder()->first()->id;
            },
            'excerpt' => $this->faker->realText(120),
            'content' => $this->faker->realText(2000, 5),
            'main_slider' => (random_int(1, 10) > 8),
            'popular' => (random_int(1, 10) > 8),
            'is_published' => (random_int(1, 10) > 1),
            'published_at' => $this->faker->dateTimeBetween('-2 months', 'now'),
        ];
    }

    public function withCleanStorageFolder()
    {
        $storagePath = storage_path($this->storage);
        if (File::exists($storagePath)) {
            File::cleanDirectory($storagePath);
        }

        return $this->state(function (array $attributes, $userId) {
            return [];
        });
    }
}
