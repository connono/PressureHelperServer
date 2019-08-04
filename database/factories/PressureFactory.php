<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Pressures::class, function (Faker $faker) {
    $date=$faker->dateTimeBetween('-21 days','now');
    return [
        'name'=>'13586199228',
        'sp'=>$faker->numberBetween($min=120,$max=140),
        'dp'=>$faker->numberBetween($min=60,$max=90),
        'created_at'=>$date,
        'updated_at'=>$date,
    ];
});
