<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => ucfirst($this->faker->words(4, true)),
            'image' => $this->makeImages('sliders'),
            'body' => $this->faker->text(200)
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
