<?php

namespace Database\Factories;

use App\Models\Oyatsu;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class OyatsuFactory extends Factory
{
    protected $model = Oyatsu::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'calory' => $this->faker->randomFloat(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
