<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Recruiter;
use Faker\Generator as Faker;

$factory->define(Recruiter::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'details' => $faker->paragraph,
        'email' => $faker->unique()->safeEmail,
        'landline' => $faker->phoneNumber,
        'mobile' => $faker->phoneNumber,
        'linkedin' => $faker->url,
    ];
});