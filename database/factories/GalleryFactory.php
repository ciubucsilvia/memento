<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gallery>
 */
class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(5, true),
            'image' => $this->makeImages('gallery'),
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
