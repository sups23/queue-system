<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NurseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::create([
            'name' => 'Nurse 1',
            'email' => 'n1@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Nawalparasi',
            'doctor_id' => 1
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 2',
            'email' => 'n2@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Chitwan',
            'doctor_id' => 2
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 3',
            'email' => 'n3@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Birgunj',
            'doctor_id' => 3
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 4',
            'email' => 'n4@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Birgunj',
            'doctor_id' => 4
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 5',
            'email' => 'n5@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Kathmandu',
            'doctor_id' => 5
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 6',
            'email' => 'n6@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Butwal',
            'doctor_id' => 6
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 7',
            'email' => 'n7@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Pokhara',
            'doctor_id' => 7
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 8',
            'email' => 'n8@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Butwal',
            'doctor_id' => 8
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 9',
            'email' => 'n9@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Jhapa',
            'doctor_id' => 9
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 10',
            'email' => 'n10@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Besisahar',
            'doctor_id' => 10
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 11',
            'email' => 'n11@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Nawalparasi',
            'doctor_id' => 11
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 12',
            'email' => 'n12@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Butwal',
            'doctor_id' => 12
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 13',
            'email' => 'n13@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Nawalparasi',
            'doctor_id' => 13
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 14',
            'email' => 'n14@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Butwal',
            'doctor_id' => 34
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 15',
            'email' => 'n15@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Kathmandu',
            'doctor_id' => 33
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 16',
            'email' => 'n16@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Nawalparasi',
            'doctor_id' => 32
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 17',
            'email' => 'n17@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Hetaunda',
            'doctor_id' => 31
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 18',
            'email' => 'n18@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Chitwan',
            'doctor_id' => 30
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 19',
            'email' => 'n19@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Kathmandu',
            'doctor_id' => 29
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 20',
            'email' => 'n20@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Butwal',
            'doctor_id' => 28
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 21',
            'email' => 'n21@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Nawalparasi',
            'doctor_id' => 27
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 22',
            'email' => 'n22@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Chitwan',
            'doctor_id' => 26
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 23',
            'email' => 'n23@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Gaindakot',
            'doctor_id' => 25
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 24',
            'email' => 'n24@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Gaindakot',
            'doctor_id' => 24
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 25',
            'email' => 'n25@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Gaindakot',
            'doctor_id' => 23
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 26',
            'email' => 'n26@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Biratnagar',
            'doctor_id' => 22
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 27',
            'email' => 'n27@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Biratnagar',
            'doctor_id' => 21
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 28',
            'email' => 'n28@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Itahari',
            'doctor_id' => 20
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 29',
            'email' => 'n29@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Pokhara',
            'doctor_id' => 19
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 30',
            'email' => 'n30@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Nawalparasi',
            'doctor_id' => 18
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 31',
            'email' => 'n31@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Chitwan',
            'doctor_id' => 17
        ]);
        $user->assignRole('Nurse');

        $user = \App\Models\User::create([
            'name' => 'Nurse 32',
            'email' => 'n32@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Kathmandu',
            'doctor_id' => 16
        ]);
        $user->assignRole('Nurse');
        
        $user = \App\Models\User::create([
            'name' => 'Nurse 33',
            'email' => 'n33@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Nawalparasi',
            'doctor_id' => 15
        ]);
        $user->assignRole('Nurse');
        $user = \App\Models\User::create([
            'name' => 'Nurse 34',
            'email' => 'n34@admin.com',
            'password' => bcrypt('password'),
            'gender' => 'Female',
            'address' => 'Butwal',
            'doctor_id' => 14
        ]);
        $user->assignRole('Nurse');
    }
}
