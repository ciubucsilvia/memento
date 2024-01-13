<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            CategorySeeder::class,
            SliderSeeder::class,
            ArticleSeeder::class,
            CommentSeeder::class,
            PortfolioSeeder::class,
            GallerySeeder::class,
            FaqSeeder::class,
            TestimonialSeeder::class,
            MenuSeeder::class,
            PageSeeder::class,
        ]);
    }
}
