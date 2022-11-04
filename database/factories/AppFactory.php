<?php

namespace Database\Factories;

use App\Models\App;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\App>
 */
class AppFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = App::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $patients = User::role('Patient')->pluck('id')->toArray();
        $arr = ['2022-11-05','2022-11-06','2022-11-07','2022-11-04'];

        return [
            'date' => $arr[array_rand($arr,1)],
            'user_id' => $patients[array_rand($patients, 1)],
            'status' => 'Unpaid',
            'severity'=> 'Normal',
            'priority' => 1
        ];

    }
}
