<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Estados;

$factory->define(App\Models\Address::class, function (Faker $faker) {
 //   $estado = Estados::getStateByID(rand(1,28));
   // var_dump($estado->id);
   // exit;
    return [
        'country' => $faker->country,
        'state' =>10,
        'city' => $faker->city,
        'post_code' => $faker->postcode,
        'public_place' => $faker->streetName, // logradouro
        'neighborhood' => $faker->streetName,
        'number' => $faker->buildingNumber,
        'complement' => $faker->secondaryAddress 
    ];
});
