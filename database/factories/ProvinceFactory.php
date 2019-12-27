<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Province;
use Faker\Generator as Faker;

$factory->define(Province::class, function (Faker $faker) {
	$province = $faker->word;
    return [
        'department_id' => App\Department::all()->random()->id,
        'province' => $province,
        'slug' => str_slug($province, '-'),
    ];
});
