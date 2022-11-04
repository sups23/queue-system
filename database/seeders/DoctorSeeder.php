<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::create([
            'name' => 'Doctor 1',
            'email' => 'd1@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Nawalparasi',
            'dept_id' => 1
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor2',
            'email' => 'd2@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Morang',
            'dept_id' => 1
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 3',
            'email' => 'd3@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Palpa',
            'dept_id' => 1
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 4',
            'email' => 'd4@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Tanahun',
            'dept_id' => 1
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 5',
            'email' => 'd5@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Parbat',
            'dept_id' => 2
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 6',
            'email' => 'd6@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Pokhara',
            'dept_id' => 2
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 7',
            'email' => 'd7@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Butwal',
            'dept_id' => 2
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 8',
            'email' => 'd8@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Chitwan',
            'dept_id' => 2
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 9',
            'email' => 'd9@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Chitwan',
            'dept_id' => 3
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 10',
            'email' => 'd10@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Kathmandu',
            'dept_id' => 3
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 11',
            'email' => 'd11@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Pokhara',
            'dept_id' => 4
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 12',
            'email' => 'd12@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Kathmandu',
            'dept_id' => 4
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 13',
            'email' => 'd13@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Kathmandu',
            'dept_id' => 4
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 14',
            'email' => 'd14@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Hetaunda',
            'dept_id' => 5
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 15',
            'email' => 'd15@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Chitwan',
            'dept_id' => 5
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 16',
            'email' => 'd16@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Jhapa',
            'dept_id' => 5
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 17',
            'email' => 'd17@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Birgunj',
            'dept_id' => 6
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 18',
            'email' => 'd18@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Kathmandu',
            'dept_id' => 6
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 19',
            'email' => 'd19@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Kathmandu',
            'dept_id' => 6
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 20',
            'email' => 'd20@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Kathmandu',
            'dept_id' => 6
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 21',
            'email' => 'd21@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Pokhara',
            'dept_id' => 6
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 22',
            'email' => 'd22@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Butwal',
            'dept_id' => 7
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 23',
            'email' => 'd23@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Chitwan',
            'dept_id' => 7
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 24',
            'email' => 'd24@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Kathmandu',
            'dept_id' => 7
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 25',
            'email' => 'd25@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Butwal',
            'dept_id' => 8
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 26',
            'email' => 'd26@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Chitwan',
            'dept_id' => 8
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 27',
            'email' => 'd27@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Kathmandu',
            'dept_id' => 9
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 28',
            'email' => 'd28@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Pokhara',
            'dept_id' => 9
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 29',
            'email' => 'd29@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Chitwan',
            'dept_id' => 9
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 30',
            'email' => 'd30@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Chitwan',
            'dept_id' => 10
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 31',
            'email' => 'd31@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Pokhara',
            'dept_id' => 10
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 32',
            'email' => 'd32@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Butwal',
            'dept_id' => 11
        ]);
        $user->assignRole('Doctor');

        $user = \App\Models\User::create([
            'name' => 'Doctor 33',
            'email' => 'd33@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Hetaunda',
            'dept_id' => 11
        ]);
        $user->assignRole('Doctor');
    }
}
