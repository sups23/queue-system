<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $depts = [
            [
                'name' => 'Medicine',
                'floor' => '1'
            ],
            [
                'name' => 'Orthopedics',
                'floor' => '1'
            ],
            [
                'name' => 'Maternity',
                'floor' => '1'
            ],
            [
                'name' => 'Physiotherapy',
                'floor' => '1'
            ],
            [
                'name' => 'Anesthesiology',
                'floor' => '2'
            ],
            [
                'name' => 'Casualty',
                'floor' => '1'
            ],
            [
                'name' => 'Surgery',
                'floor' => '2'
            ],
            [
                'name' => 'Hematology',
                'floor' => '2'
            ],
            [
                'name' => 'ENT',
                'floor' => '2'
            ],
            [
                'name' => 'Radiology',
                'floor' => '3'
            ],
            [
                'name' => 'Cardiology',
                'floor' => '3'
            ],
        ];
        \App\Models\Dept::insert($depts);
    }
}
