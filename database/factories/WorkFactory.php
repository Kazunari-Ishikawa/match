<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Work;
use Faker\Generator as Faker;

$factory->define(Work::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'type' => $faker->numberBetween(0,1),
        'category' => $faker->numberBetween(1,8),
        'max_price' => $faker->numberBetween(30000, 50000),
        'min_price' => $faker->numberBetween(5000, 10000),
        'content' => $faker->text,
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        },
        'is_closed' => 0,
    ];
});
