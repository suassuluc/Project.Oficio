<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Setor::create([
            'nome' => 'Bolsas',
        ]);

        \App\Models\Setor::create([
            'nome' => 'Informatica',
        ]);

        \App\Models\Setor::create([
            'nome' => 'Gabinete',
        ]);

    }
}
