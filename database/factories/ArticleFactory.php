<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = ucfirst($this->faker->words(5, true));

        return [
            'title' => $title,
            'alias' => Str::slug($title),
            'body' => $this->faker->text(5000),
            'meta_desc' => $this->faker->text,
            'published' => $this->faker->numberBetween(0, 1),
            'image' => $this->makeImages('articles'),
            'category_id' => $this->faker->numberBetween(1, 5),
            'user_id' => 1
        ];
    }

    public function makeImages($path)
    {
        $settings = Config('settings.' . $path);

        $obj = new \stdClass;

        $path = public_path(Config('settings.theme') . '\images\\' . $path);

        if(!File::exists($path)) {
            File::makeDirectory($path);
        }

        foreach($settings as $key => $set) {
            $image = $this->faker->image($path, $set['width'], $set['height']);
            $obj->$key = basename($image);
        }
        return json_encode($obj);
    }
}
