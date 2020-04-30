<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'board_id' => 1,
        'user_id' => 1,
        'content' => 'テストテストテスト'
    ];
});
