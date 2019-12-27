<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Candidate;
use Faker\Generator as Faker;

$factory->define(Candidate::class, function (Faker $faker) {
    $name = $faker->name;
	$last_name = $faker->lastName;
	$skills = '{"skill_1" : "'.App\Skill::all()->unique()->random()->id.'","skill_2" : "'.App\Skill::all()->unique()->random()->id.'","skill_3" : "'.App\Skill::all()->unique()->random()->id.'","skill_4" : "'.App\Skill::all()->unique()->random()->id.'"}';
	$languajes = '{"lang_1" : "'.App\Language::all()->unique()->random()->id.'","lang_2" : "'.App\Language::all()->unique()->random()->id.'"}';
    return [
        'user_id' => App\User::all()->random()->id,
        'name' => $name,
        'last_name' => $last_name,
        'biography' => $faker->paragraph,
        'professional_title' => $faker->sentence,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'languages' => $languajes,
        'skills' => $skills,
        'slug' => str_slug($name." ".$last_name, '-'),
        'department_id' => App\Department::all()->random()->id,
        'province_id' => App\Province::all()->random()->id
    ];
});
