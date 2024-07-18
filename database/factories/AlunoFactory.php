<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class AlunoFactory extends Factory
{

    public function definition(): array
    {
        return [
            'codigo'=> $this->faker->unique()->word(10),
            'primeiroNome'=> $this->faker->word,
            'sobrenome'=> $this->faker->word,
            'nascimento'=> $this->faker->date(),
            'sala'=> $this->faker->word,
            'situacao'=> $this->faker->boolean(),
        ];
    }
}
