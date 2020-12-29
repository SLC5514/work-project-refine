<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Ad;
use Faker\Generator as Faker;

$factory->define(Ad::class, function (Faker $faker) {
    return [
        'position' => $faker->randomElement([1, 2, 3, 4]),
        'weight' => $faker->biasedNumberBetween(),
        'title' => $faker->text(),
        'subtitle' => $faker->sentence(),
        'description' => $faker->text(),
        'link' => $faker->url,
        'up_line_at' => $faker->dateTimeInInterval('-5 days'),
        'down_line_at' => $faker->dateTimeInInterval('+20 days'),
        'img_src' => $faker->imageUrl(2650, 635),
    ];
});
