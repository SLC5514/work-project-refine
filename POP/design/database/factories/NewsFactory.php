<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use App\Models\Rtf;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
    ];
});

$factory->state(News::class, 'activity', function (Faker $faker) {
    return [
        'type' => 1,
        'title' => $faker->sentence,
        'up_line_at' => $faker->dateTimeInInterval('-5 days'),
        'down_line_at' => $faker->dateTimeInInterval('+20 days'),
        'img_src' => $faker->imageUrl(384, 216),
        'qr_code_title' => $faker->title,
        'qr_code_images' => $faker->imageUrl(),
        'activity_type' => $faker->randomElement([1,2]),
        'design_world' => $faker->randomElement([1,2,3,4,5,6,7,8]),
        'venue' => $faker->address,
        'begin_at' => $faker->dateTimeInInterval('+2 days'),
        'end_at' => $faker->dateTimeInInterval('+12 days'),
    ];
});

$factory->state(News::class, 'news', function(Faker $faker){
    return [
        'type' => 2,
        'title' => $faker->sentence,
        'description' => $faker->text,
        'up_line_at' => $faker->dateTimeInInterval('-5 days'),
        'down_line_at' => $faker->dateTimeInInterval('+20 days'),
        'img_src' => $faker->imageUrl(270, 203),
        'qr_code_title' => $faker->title,
        'qr_code_images' => $faker->imageUrl(),
    ];
});

$factory->afterCreating(News::class, function (News $news, $faker) {
    $news->content()->save(factory(Rtf::class)->make());
});


