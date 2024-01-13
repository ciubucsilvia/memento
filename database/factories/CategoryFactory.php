<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = ucfirst($this->faker->words(4, true));

        return [
            'title' => $title,
            'alias' => Str::slug($title),
            // 'type' => 'article'
        ];
    }

    public function typeCategory($name): Factory
    {
        return $this->state(function(array $attributes) use ($name) {
            return [
                'type' => $name,
            ];
        });
    }
}
