<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Package;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Package::class, function (Faker $faker) {
    return [
        'name' => Str::random(10),
        'status' => '1',
        'user_id' => User::orderByRaw('RAND()')->take(1)->first()->id
    ];
});
