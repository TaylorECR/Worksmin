<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Job;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'title' => $title,
        'description' => $faker->paragraph,
        'company_id' => App\Company::all()->random()->id,
        'subcategory_id' => App\Subcategory::all()->random()->id,
        'job_type_id' => App\JobType::all()->random()->id,
        'province_id' => App\Province::all()->random()->id,
        'min_salary' => $faker->randomFloat(2, 1000, 5000),
        'max_salary' => $faker->randomFloat(2, 5000, 10000),
        'expiration_date' => $faker->dateTimeInInterval('now', '+ 40 days', 'America/Lima'),
        'slug' => str_slug($title, '-')
    ];
});
