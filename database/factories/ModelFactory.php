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

$factory->define(Curema\Models\User::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('da_DK');

    return [
        'name' => $faker->name(),
        'title' => $faker->randomElement(['Vice President', 'Assistant Developer', 'Developer', 'Account Manager', 'Key Account Manager', 'Supporter']),
        'street_name' => $faker->streetName(),
        'street_number' => $faker->buildingNumber(),
        'city' => $faker->city(),
        'zip' => $faker->postcode(),
        'country' => 'Danmark',
        'phone' => $faker->phoneNumber(),
        'email' => $faker->email(),
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(60),
    ];
});

$factory->define(Curema\Models\App\Account::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('da_DK');

    return [
        'user_id' => $faker->numberBetween(1, 30),
        'name' => $faker->company(),
        'street_name' => $faker->streetName(),
        'street_number' => $faker->buildingNumber(),
        'city' => $faker->city(),
        'zip' => $faker->postcode(),
        'country' => 'Danmark',
        'cvr' => $faker->cvr,
        'phone' => $faker->phoneNumber(),
        'email' => $faker->email(),
        'website' => $faker->domainName(),
    ];
});

$factory->define(Curema\Models\App\Contact::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('da_DK');

    return [
        'name' => $faker->name(),
        'title' => $faker->randomElement(['Vice President', 'Assistant Developer', 'Developer', 'Account Manager', 'Key Account Manager', 'Supporter']),
        'street_name' => $faker->streetName(),
        'street_number' => $faker->buildingNumber(),
        'city' => $faker->city(),
        'zip' => $faker->postcode(),
        'country' => 'Danmark',
        'phone' => $faker->phoneNumber(),
        'email' => $faker->email(),
        'user_id' => $faker->numberBetween(1, 30),
        'account_id' => $faker->numberBetween(1, 5),
    ];
});

$factory->define(Curema\Models\App\Lead::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('da_DK');

    return [
        'name' => $faker->name(),
        'title' => $faker->randomElement(['Vice President', 'Assistant Developer', 'Developer', 'Account Manager', 'Key Account Manager', 'Supporter']),
        'street_name' => $faker->streetName(),
        'street_number' => $faker->buildingNumber(),
        'city' => $faker->city(),
        'zip' => $faker->postcode(),
        'country' => 'Danmark',
        'phone' => $faker->phoneNumber(),
        'email' => $faker->email(),
        'company' => $faker->company(),
        'user_id' => $faker->numberBetween(1, 30),
    ];
});

$factory->define(Curema\Models\App\Opportunity::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('da_DK');

    return [
        'name' => 'Widgets ' . ($faker->randomDigit() + 1) * 100,
        'amount' => ($faker->randomDigit() + 1) * 10000,
        'opportunity_stage_id' => $faker->numberBetween(1, 4),
        'user_id' => $faker->numberBetween(1, 30),
        'account_id' => $faker->numberBetween(1, 5),
    ];
});

$factory->define(Curema\Models\App\Ticket::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('da_DK');

    return [
        'subject' => $faker->sentence(6),
        'description' => $faker->paragraph(),
        'user_id' => $faker->numberBetween(1, 30),
        'contact_id' => $faker->numberBetween(1, 10),
        'account_id' => $faker->numberBetween(1, 5),
    ];
});

$factory->define(Curema\Models\App\Call::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('da_DK');

    return [
        'lead_id' => $faker->numberBetween(1, 10),
        'contact_id' => $faker->numberBetween(1, 10),
        'account_id' => $faker->numberBetween(1, 5),
        'user_id' => $faker->numberBetween(1, 27),
        'content' => $faker->paragraph(),
    ];
});

$factory->define(Curema\Models\App\Email::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('da_DK');

    return [
        'lead_id' => $faker->numberBetween(1, 10),
        'contact_id' => $faker->numberBetween(1, 10),
        'account_id' => $faker->numberBetween(1, 5),
        'user_id' => $faker->numberBetween(1, 27),
        'content' => $faker->paragraph(),
    ];
});