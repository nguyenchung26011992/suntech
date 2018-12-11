<?php

use Illuminate\Database\Seeder;
use NF\Roles\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::updateOrCreate([
            'slug' => 'view.roles',
        ], [
            'name'        => 'View Roles',
            'slug'        => 'view.roles',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'create.roles',
        ], [
            'name'        => 'Create Roles',
            'slug'        => 'create.roles',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'update.roles',
        ], [
            'name'        => 'Update Roles',
            'slug'        => 'update.roles',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'delete.roles',
        ], [
            'name' => 'Delete Roles',
            'slug' => 'delete.roles',
        ]);

        // Users
        Permission::updateOrCreate([
            'slug' => 'view.users',
        ], [
            'name'        => 'View Users',
            'slug'        => 'view.users',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'create.users',
        ], [
            'name'        => 'Create Users',
            'slug'        => 'create.users',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'update.users',
        ], [
            'name'        => 'Update Users',
            'slug'        => 'update.users',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'delete.users',
        ], [
            'name' => 'Delete Users',
            'slug' => 'delete.users',
        ]);

        // Categories
        Permission::updateOrCreate([
            'slug' => 'view.categories',
        ], [
            'name'        => 'View Categories',
            'slug'        => 'view.categories',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'create.categories',
        ], [
            'name'        => 'Create Categories',
            'slug'        => 'create.categories',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'update.categories',
        ], [
            'name'        => 'Update Categories',
            'slug'        => 'update.categories',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'delete.categories',
        ], [
            'name' => 'Delete Categories',
            'slug' => 'delete.categories',
        ]);

        // Posts
        Permission::updateOrCreate([
            'slug' => 'view.posts',
        ], [
            'name'        => 'View Posts',
            'slug'        => 'view.posts',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'create.posts',
        ], [
            'name'        => 'Create Posts',
            'slug'        => 'create.posts',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'update.posts',
        ], [
            'name'        => 'Update Posts',
            'slug'        => 'update.posts',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'delete.posts',
        ], [
            'name' => 'Delete Posts',
            'slug' => 'delete.posts',
        ]);

        // Events
        Permission::updateOrCreate([
            'slug' => 'view.events',
        ], [
            'name'        => 'View Events',
            'slug'        => 'view.events',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'create.events',
        ], [
            'name'        => 'Create Events',
            'slug'        => 'create.events',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'update.events',
        ], [
            'name'        => 'Update Events',
            'slug'        => 'update.events',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'delete.events',
        ], [
            'name' => 'Delete Events',
            'slug' => 'delete.events',
        ]);

        // Courses
        Permission::updateOrCreate([
            'slug' => 'view.courses',
        ], [
            'name'        => 'View Courses',
            'slug'        => 'view.courses',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'create.courses',
        ], [
            'name'        => 'Create Courses',
            'slug'        => 'create.courses',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'update.courses',
        ], [
            'name'        => 'Update Courses',
            'slug'        => 'update.courses',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'delete.courses',
        ], [
            'name' => 'Delete Courses',
            'slug' => 'delete.courses',
        ]);
    }
}
