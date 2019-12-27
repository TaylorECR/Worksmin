<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
	$category = $faker->word;
    return [
        'category' => $category,
        'icon' => $faker->word,
        'slug' => str_slug($category, '-')
    ];
});
