<?php

use App\Entities\Slider;
use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
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
                'image' => '/assets/images/sliders/home_slider_1.jpg',
            ],
        ];

        foreach ($sliders as $item) {
            $slider = Slider::updateOrCreate([
                'image' => $item['image'],
            ], $item);

            $slider->status   = Slider::STATUS_ACTIVE;
            $slider->save();
        }
    }
}
