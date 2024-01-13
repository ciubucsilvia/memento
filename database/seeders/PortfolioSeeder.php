<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = public_path(Config('settings.theme') . '\images\portfolios\\');

        if(File::exists($path)) {
            foreach(File::files($path) as $file) {
                File::delete($file);
            }
        }

        \App\Models\Portfolio::factory(20)->create();
    }
}
