<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Board;
use Faker\Generator as Faker;

$factory->define(Board::class, function (Faker $faker) {
    return [
        'work_id' => 1,
        'from_user_id' => 1,
        'to_user_id' => 2,
    ];
});
