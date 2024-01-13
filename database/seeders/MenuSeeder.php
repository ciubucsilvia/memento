<?php

namespace Database\Seeders;

use App\Models\ItemsMenu;
use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menuHeader = Menu::create([
            'title' => 'menuHeader'
        ]);

        $menuBottom = Menu::create([
            'title' => 'menuBottom'
        ]);

        ItemsMenu::create([
                'menu_id' => $menuHeader->id,
                'title' => 'Home',
                'path' => 'index',
        ]);
        ItemsMenu::create([
                'menu_id' => $menuHeader->id,
                'title' => 'Portfolio',
                'path' => 'portfolios',
        ]);
        ItemsMenu::create([
                'menu_id' => $menuHeader->id,
                'title' => 'Blog',
                'path' => 'articles',
        ]);
        ItemsMenu::create([
                'menu_id' => $menuHeader->id,
                'title' => 'Faq',
                'path' => 'faqs',
        ]);
        ItemsMenu::create([
                'menu_id' => $menuHeader->id,
                'title' => 'Testimonials',
                'path' => 'testimonials',
        ]);
        ItemsMenu::create([
                'menu_id' => $menuHeader->id,
                'title' => 'Gallery',
                'path' => 'gallery',
        ]);
        ItemsMenu::create([
                'menu_id' => $menuHeader->id,
                'title' => 'Contact',
                'path' => 'contact',
        ]);

        ItemsMenu::create([
                'menu_id' => $menuBottom->id,
                'title' => 'Portfolio',
                'path' => 'portfolios',
        ]);
        ItemsMenu::create([
                'menu_id' => $menuBottom->id,
                'title' => 'Blog',
                'path' => 'articles',
        ]);
        ItemsMenu::create([
                'menu_id' => $menuBottom->id,
                'title' => 'Faq',
                'path' => 'faqs',
        ]);
        ItemsMenu::create([
                'menu_id' => $menuBottom->id,
                'title' => 'Testimonials',
                'path' => 'testimonials',
        ]);

        ItemsMenu::create([
                'menu_id' => $menuBottom->id,
                'title' => 'Contact',
                'path' => 'contact',
        ]);
    }
}
