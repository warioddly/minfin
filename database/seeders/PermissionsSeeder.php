<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'show-posts',
            'add-posts',
            'delete-posts',
            'edit-posts',

            'show-categories',
            'add-categories',
            'delete-categories',
            'edit-categories',

            'show-users',
            'add-users',
            'delete-users',
            'edit-users',

            'show-pages',
            'add-pages',
            'delete-pages',
            'edit-pages',

            'show-roles',
            'add-roles',
            'delete-roles',
            'edit-roles',

            'show-logs',
            'show-filemanager',
        ];

        foreach ($permissions as $permission){
            Permission::create(['name' => $permission]);
        }
    }
}