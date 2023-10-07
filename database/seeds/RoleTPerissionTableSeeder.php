<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RoleTPerissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $perms = DB::table('permissions')->get();
        $role = DB::table('roles')->where('id', 2)->first()->id;

        foreach($perms as $perm) {
            DB::table('role_permissions')->insert([
                [
                    'role_id' => $role,
                    'permission_id' => $perm->id
                ]
            ]);
        }
    }
}
