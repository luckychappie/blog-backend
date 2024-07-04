<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


class PostFactory extends Factory
{

    protected $model = Post::class;

    public function definition()
    {
        $title = $this->faker->sentence;
        $slug = Str::slug($title);
        return [
            'title' => $title,
            'slug' => $slug,
            'content' => $this->faker->paragraph,
            'user_id' => User::factory(),
            'is_published' => 1,
        ];
    }
}
