<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create "admin" role
        $adminRole = Role::create([
            'role_name' => 'admin',
        ]);

        // Assign permissions to the "admin" role
        $adminRole->permissions()->attach([1, 2, 3, 4, 5, 6]);
    }
}
