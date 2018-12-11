<?php

use Illuminate\Database\Seeder;
use NF\Roles\Models\Permission;
use NF\Roles\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();

        $admin = Role::updateOrCreate([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);

        $lecturer = Role::updateOrCreate([
            'name' => 'Lecturer',
            'slug' => 'lecturer',
        ]);

        $user = Role::updateOrCreate([
            'name' => 'User',
            'slug' => 'user',
        ]);

        $admin->permissions()->sync($permissions->pluck('id'));
    }
}
