<?php

use Faker\Generator as Faker;

$factory->define(App\Model\user\post::class, function (Faker $faker) {
    return [
        "title" => $faker->sentence,
        "body" => $faker->paragraph,
        "slug" => str_slug($faker->sentence),
        "status" => rand(0,1),
        "image" => "",
        "posted_by" => rand(1,3),
        "category_id" => rand(1,3),
    ];
});
