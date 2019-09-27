<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Customer::class, function (Faker $faker) {
    return [
        //'id' => '',
        'code' => rand(1, 1000),
        'name' => $faker->name,
        'status_id' => 1,
        'phone' => '32 9 8427-0126',
        'born_in' => $faker->dateTimeThisCentury->format('Y-m-d')
    ];
});
