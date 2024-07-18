<?php

namespace Database\Seeders;

use App\Models\Aluno;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AlunosSeeder extends Seeder
{

    public function run(): void
    {
       Aluno::factory(35)->create();
    }
}
