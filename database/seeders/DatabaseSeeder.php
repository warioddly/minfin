<?php

namespace Database\Seeders;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Генерация администратора

         $superUser = \App\Models\User::factory()->create([
             'last_name' => 'Super',
             'name' => 'User',
             'about' => 'Hello Everyone im admin',
             'email' => 'admin@email.com',
             'password' => Hash::make('admin'),
         ]);

        User::factory(2)->create();

        // Генерация ролей

        $roles = [
            'super user',
            'admin',
            'editor',
            'co-editor',
            'guest',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $superUser->assignRole('super user');

    }
}
