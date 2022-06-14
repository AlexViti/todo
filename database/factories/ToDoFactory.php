<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ToDo;
use App\TodoList;
use Faker\Generator as Faker;

$factory->define(ToDo::class, function (Faker $faker) {
    return [
        'todo_list_id' => $faker->numberBetween(1, TodoList::count()),
        'title' => $faker->sentence,
        'description' => $faker->text,
        'completed' => false
    ];
});
