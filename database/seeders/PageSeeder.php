<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::create([
            'title' => 'Welcome to Memènto',
            'alias' => 'index',
            'body' => '<p>Cras et sem sed purus bibendum molestie vitae non metus. Nam eros sem, elementum ac cursus sed, consectetur ac nisi. Duis libero diam, vehicula sit amet accumsan in,<a href="#"> fermentum at nibh</a>. Curabitur lacinia pulvinar tempor. Integer sit amet neque ipsum, eu imperdiet dolor. Mauris hendrerit diam non neque aliquam tincidunt. In ac diam sed metus tincidunt laoreet non hendrerit felis.</p>
            <h5>A small title to improve your SEO</h5>
            <p>Donec pulvinar orci a dolor lobortis eu lacinia erat adipiscing. Pellentesque porttitor pretium rhoncus. Vestibulum ornare <strong>lectus eget urna elementum</strong> congue. Aenean sit amet sapien tempus erat mollis lobortis. Nulla facilisi. Sed in mi tortor, a tincidunt massa. Integer dictum purus at risus blandit mattis.</p>'
        ]);
    }
}
