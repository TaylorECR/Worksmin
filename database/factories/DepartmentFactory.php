<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Department;
use Faker\Generator as Faker;

$factory->define(Department::class, function (Faker $faker) {
	$department = $faker->word;
    return [
        'department' => $department,
        'slug' => str_slug($department, '-'),
    ];
});
