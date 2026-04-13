<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'title'=>$this->faker->city,
           'post_content'=>$this->faker->text,
           'image'=>'First object from Factory class to table Post',
           'likes'=>random_int(1, 100),
           'is_published'=>1,
           'category_id'=>2,
        ];
    }
}
