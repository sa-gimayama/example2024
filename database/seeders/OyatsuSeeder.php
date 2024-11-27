<?php

namespace Database\Seeders;

use App\Models\Oyatsu;
use Illuminate\Database\Seeder;

class OyatsuSeeder extends Seeder
{
    public function run()
    {
        Oyatsu::factory()->createMany([
            [
                'name' => 'ドーナツ',
                'calory' => 217,
            ],
            [
                'name' => 'プリン',
                'calory' => 296,
            ],
            [
                'name' => 'シュークリーム',
                'calory' => 264,
            ]
        ]);
    }
}
