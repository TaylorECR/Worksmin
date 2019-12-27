<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sector;
use Faker\Generator as Faker;

$factory->define(Sector::class, function (Faker $faker) {
	$sector = $faker->word;
    return [
        'sector' => $sector,
        'slug' => str_slug($sector, '-')
    ];
});
