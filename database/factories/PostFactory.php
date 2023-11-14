<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use function PHPSTORM_META\map;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.    
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $loremIpsum = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.";
        $paragraphs = collect($this->faker->paragraphs(mt_rand(5, 15)))->map(fn ($paragraph) => "<p>$paragraph</p>")->implode('');

        return [
            'author_id' => mt_rand(1, 10),
            'category_id' => mt_rand(1, 5),
            'title' => $this->faker->sentence(mt_rand(3, 6)),
            'slug' => $this->faker->slug(mt_rand(3, 6)),
            // 'excerpt' => $this->faker->paragraph(1),
            'excerpt' => $loremIpsum,
            'body' => $paragraphs,
            'views' => mt_rand(50, 200),
            'likes' => mt_rand(30, 100),
            'published_at' => now()
        ];
    }
}
