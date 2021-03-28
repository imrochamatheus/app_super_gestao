<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\sitecontato;
use Faker\Generator as Faker;

$factory->define(sitecontato::class, function (Faker $faker) {
    return [
        //
        'nome'=> $faker->name,
        'telefone'=> $faker->tollFreePhoneNumber,
        'email'=> $faker->email,
        'motivo_contato'=> $faker->numberBetween(1,3),
        'mensagem'=> $faker->text(200)
    ];
});
