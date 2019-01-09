<?php
// app/database/factories/FileFactory.php
use Faker\Generator as Faker;
$factory->define(App\File::class, function (Faker $faker) {
    $users = App\User::pluck('id')->toArray();
    return [
        'title' => $faker->unique()->name,
        'user_id' => $faker->randomElement($users),
        'author' =>$faker->unique()->name,
        'audio' =>$faker->audio
    ];
});