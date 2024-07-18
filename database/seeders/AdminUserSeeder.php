<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::create([
            'first_name' => 'Hussein',
            'last_name' => 'Mcheni',
            'email' => 'admudom@gmail.com',
            'phone_number' => '255657193444',
            'password' => Hash::make('@admin2024'),
            'role' => 'admin',
            'status'=>'active',
        ]);
       


        // Retrieve the admin role
        $adminRole = Role::where('role_name', 'admin')->first();

        // Attach the admin role to the admin user
        if ($adminRole) {
            $adminUser->roles()->attach($adminRole);
        }
    }
}
