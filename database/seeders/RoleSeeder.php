<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Backpack\PermissionManager\app\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Doctor',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Accountant',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Patient',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Nurse',
                'guard_name' => 'web'
            ]
        ];
        Role::insert($roles);
    }
}
