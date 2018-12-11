<?php

use App\Entities\Post;
use App\Entities\User;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(Post::class, function (Faker $faker) {
    $user = User::where('email', '=', 'admin@suntech.com')->first();

    return [
        'title'     => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'slug'      => $faker->slug,
        'image'     => '/assets/images/posts/news_1.jpg',
        'content'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
        'status'    => Post::STATUS_ACTIVE,
        'author_id' => $user->id,
    ];
});
