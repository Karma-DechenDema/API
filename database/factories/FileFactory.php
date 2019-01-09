<?php
// app/database/factories/FileFactory.php
use Faker\Generator as Faker;
$factory->define(App\File::class, function (Faker $faker) {
    $users = App\User::pluck('id')->toArray();
    return [
        'title' => $faker->unique()->name,
        'overview' => $faker->text,
        'user_id' => $faker->randomElement($users),
        'story' => $faker->text,
        'author' =>$faker->unique()->name,
        'image' =>$faker->image
    ];
});