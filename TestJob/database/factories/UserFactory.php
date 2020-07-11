<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Company;
use App\Jobs;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_type' => 'user',
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Jobs::class, function (Faker $faker) {
    return [
        'user_id'       => User::all()->random()->id,
        'company_id'    => Company::all()->random()->id,
        'category_id'   => rand(0, 20),
        'vacancy'       => rand(10, 50),
        'title'         => $title = $faker->text,
        'slug'          => str_slug($title),
        'position'      => $faker->jobTitle,
        'job_type'      => 'Full Time',
        'job_context'    => $faker->text,
        'salary'        => rand(10000, 300000),
        'last_date'     => $faker->dateTime,
        'education'     => $faker->text,
        'experience'    => $faker->text,
        'description'   => $faker->paragraph,
    ];
});


$factory->define(Company::class, function (Faker $faker) {
    return [
        'user_id'       => User::all()->random()->id,
        'cname'         => $name = $faker->company,
        'slug'          => str_slug($name),
        'phone'         => $faker->phoneNumber,
        'website'       => $faker->domainName,
        'email'         => $faker->email,
        'logo'          => 'images/logo.png',
        'cover_photo'   => 'images/logo.png',
        'slogan'        => 'Learn To Laravel in PHP',
        'description'   => $faker->paragraph,
        'address'       => $faker->address,
    ];
});
