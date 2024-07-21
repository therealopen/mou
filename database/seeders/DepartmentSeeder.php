<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //add seeder here
        $departments = [
            ['department_name' => 'ICT'],
            ['department_name' => 'Finance'],
            ['department_name' => 'HR'],
            ['department_name' => 'Marketing'],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
