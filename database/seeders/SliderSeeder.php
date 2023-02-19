<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;
class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sliders = [
            [
                'title' => 'slider 1',
                'image' => 'default.png',
                'desc' => 'desc slider 1',
                'status' => '1',
                'order' => '1',
            ],
            [
                'title' => 'slider 2',
                'image' => 'default.png',
                'desc' => 'desc slider 2',
                'status' => '1',
                'order' => '2',
            ],
            [
                'title' => 'slider 3',
                'image' => 'default.png',
                'desc' => 'desc slider 3',
                'status' => '0',
                'order' => '3',
            ],
        ];

        Slider::insert($sliders);
    }
}
