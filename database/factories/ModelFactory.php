<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Post::class, function () {

    $faker = Faker\Factory::create('zh_CN');

    return [
        'title' => $faker->sentence(),
        'author' => $faker->name,
        'content' => $faker->text,
        'uuid' => $faker->uuid(),
        'seo_title' => $faker->word(),
        'seo_keyword' => $faker->word(),
        'seo_desc' => $faker->sentence(),
        'created_at' => $faker->dateTimeBetween('now'),
        'updated_at' => $faker->dateTimeBetween('now'),
        
    ];
});

$factory->define(\App\Category::class, function (Faker\Generator $faker) {

    $zh = Faker\Factory::create('zh_CN');

    return [
        'name' => $zh->word(),
        'name_en' => implode('_',$faker->words(2)),
        'created_at' => $faker->dateTimeBetween('now'),
        'updated_at' => $faker->dateTimeBetween('now'),
        
    ];
});

$factory->define(\App\Comment::class, function () {

    $faker = Faker\Factory::create('zh_CN');

    return [
        'content' => $faker->text,
        'created_at' => $faker->dateTimeBetween('now'),
        'updated_at' => $faker->dateTimeBetween('now'),
        
    ];
});

$factory->define(\App\Tag::class, function () {

    $faker = Faker\Factory::create('zh_CN');

    return [
        'name' => $faker->word(),
        'created_at' => $faker->dateTimeBetween('now'),
        'updated_at' => $faker->dateTimeBetween('now'),
        
    ];
});