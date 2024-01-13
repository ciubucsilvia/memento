<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => '$2y$12$Wx8EVP/vlA15VwNvGhNZFejEgxq/2eHhwCURchOYktilOLqMQqt1e' //MasaMare44
            ]);

        Role::create(['name' => 'guest']);
        
        $role = Role::create(['name' => 'admin']);
        $user->syncRoles($role);

        $permissions = [
            'view admin',
            
            'view permissions',
            'create permission',
            'show permission',
            'edit permission',
            'delete permission',

            'view roles',
            'create role',
            'show role',
            'edit role',
            'delete role',

            'view users',
            'create user',
            'show user',
            'edit user',
            'delete user',

            'view categories',
            'create category',
            'show category',
            'edit category',
            'delete category',
 
            'view menus',
            'create menu',
            'show menu',
            'edit menu',
            'delete menu',

            'create item_menu',
            'show item_menu',
            'edit item_menu',
            'delete item_menu',

            'view articles',
            'create article',
            'show article',
            'edit article',
            'delete article',

            'view portfolios',
            'create portfolio',
            'show portfolio',
            'edit portfolio',
            'delete portfolio',

            'view sliders',
            'create slider',
            'show slider',
            'edit slider',
            'delete slider',

            'view galleries',
            'create gallery',
            'show gallery',
            'edit gallery',
            'delete gallery',
        
            'view faqs',
            'create faq',
            'show faq',
            'edit faq',
            'delete faq',

            'view testimonials',
            'create testimonial',
            'show testimonial',
            'edit testimonial',
            'delete testimonial',

            'view pages',
            'create page',
            'show page',
            'edit page',
            'delete page',

            'view social',
            'create social',
            'show social',
            'edit social',
            'delete social',
        ];

        foreach($permissions as $perm) {
            $permission = Permission::create(['name' => $perm]);
            $permission->assignRole($role);
        }
    }
}
