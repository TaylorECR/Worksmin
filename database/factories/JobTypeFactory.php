<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\JobType;
use Faker\Generator as Faker;

$factory->define(JobType::class, function (Faker $faker) {
	$job_type = $faker->word;
    return [
        'job_type' => $job_type,
        'slug' => str_slug($job_type, '-'),
    ];
});
