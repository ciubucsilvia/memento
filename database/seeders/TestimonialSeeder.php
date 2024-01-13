<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = public_path(Config('settings.theme') . '\images\testimonials\\');

        if(File::exists($path)) {
            foreach(File::files($path) as $file) {
                File::delete($file);
            }
        }

        \App\Models\Testimonial::factory(10)->create();
    }
}
