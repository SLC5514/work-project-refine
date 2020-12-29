<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Rtf;
use Faker\Generator as Faker;

$factory->define(Rtf::class, function (Faker $faker) {
    return [
        'content'=> $faker->randomHtml()
    ];
});
