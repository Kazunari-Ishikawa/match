<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Work;
use Faker\Generator as Faker;

$factory->define(Work::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'category_id' => $faker->numberBetween(1,7),
        'type' => $faker->numberBetween(1,2),
        'max_price' => $faker->numberBetween(50, 80),
        'min_price' => $faker->numberBetween(5, 10),
        'content' => $faker->text,
        // 'user_id' => function() {
        //     return factory(App\User::class)->create()->id;
        // },
        'is_closed' => 0,
    ];
});
