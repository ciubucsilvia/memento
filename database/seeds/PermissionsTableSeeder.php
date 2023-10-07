<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
        	['title' => 'VIEW_ADMIN'],
            ['title' => 'VIEW_USERS'],
            ['title' => 'ADD_USERS'],
            ['title' => 'EDIT_USERS'],
            ['title' => 'DELETE_USERS'],
            ['title' => 'VIEW_PERMISSIONS'],
            ['title' => 'EDIT_PERMISSIONS'],
        	['title' => 'VIEW_MENUS'],
            ['title' => 'ADD_MENUS'],
            ['title' => 'EDIT_MENUS'],
            ['title' => 'DELETE_MENUS'],
        	['title' => 'VIEW_ARTICLES'],
        	['title' => 'ADD_ARTICLES'],
        	['title' => 'EDIT_ARTICLES'],
        	['title' => 'DELETE_ARTICLES'],
        	['title' => 'VIEW_PORTFOLIOS'],
        	['title' => 'ADD_PORTFOLIOS'],
        	['title' => 'EDIT_PORTFOLIOS'],
        	['title' => 'DELETE_PORTFOLIOS'],
            ['title' => 'VIEW_FAQS'],
            ['title' => 'ADD_FAQS'],
            ['title' => 'EDIT_FAQS'],
            ['title' => 'DELETE_FAQS'],
            ['title' => 'VIEW_SLIDERS'],
            ['title' => 'ADD_SLIDERS'],
            ['title' => 'EDIT_SLIDERS'],
            ['title' => 'DELETE_SLIDERS'],
        	['title' => 'VIEW_PAGES'],
        	['title' => 'ADD_PAGES'],
        	['title' => 'EDIT_PAGES'],
        	['title' => 'DELETE_PAGES'],
        	['title' => 'VIEW_CATEGORIES'],
        	['title' => 'ADD_CATEGORIES'],
        	['title' => 'EDIT_CATEGORIES'],
        	['title' => 'DELETE_CATEGORIES'],
        	['title' => 'VIEW_COMMENTS'],
        	['title' => 'DELETE_COMMENTS'],
        	['title' => 'VIEW_TESTIMONIALS'],
        	['title' => 'ADD_TESTIMONIALS'],
        	['title' => 'EDIT_TESTIMONIALS'],
        	['title' => 'DELETE_TESTIMONIALS'],
        	['title' => 'VIEW_GALLERIES'],
        	['title' => 'ADD_GALLERIES'],
        	['title' => 'EDIT_GALLERIES'],
        	['title' => 'DELETE_GALLERIES'],
        ]);
    }
}
