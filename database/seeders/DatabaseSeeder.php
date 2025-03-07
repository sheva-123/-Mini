<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $adminRole = Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        // Tambahkan role 'user'
        $userRole = Role::create([
            'name' => 'user',
            'guard_name' => 'web',
        ]);

        $adminUser = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'avatar' => 'images/default-avatar.png',
        ]);

        $user = User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678'),
            'avatar' => 'avatars/default-avatar.png',

        ]);

        $adminUser->assignRole($adminRole);
        $user->assignRole($userRole);
    }
}
