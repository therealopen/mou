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
    // Create roles
    $roles = [
        // ['role_name' => 'admin'],
        ['role_name' => 'hod'],
        ['role_name' => 'director'],
        ['role_name' => 'coordinator'],
    ];

    // Loop through roles and create them
    foreach ($roles as $roleData) {
        $role = Role::create($roleData);

        // Assign permissions to each role if necessary
        // Assuming the same permissions for simplicity
        $role->permissions()->attach([1, 2, 3, 4, 5, 6]);
    }
}
}
