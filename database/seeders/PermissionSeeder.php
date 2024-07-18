<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the permissions
        $permissions = [
            'Admin access',
            'adding new user',
            'User management',
            'disabling user',
            'managing roles',
            'adding roles to user',
            'auditing system and activities',
            'adding contract',
            'view contract',
            'adding consultant',
            'viewing consultant',
            'viewing report',
            'approve contract',
            'extend contract',
            'terminate contract',
            'viewing contract',
            'resend contract',
        ];

        // Seed the permissions
        foreach ($permissions as $permissionName) {
            Permission::create(['permission_name' => $permissionName]);
        }
    }
}
