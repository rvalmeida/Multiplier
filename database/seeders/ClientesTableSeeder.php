<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('pt_BR'); 

        foreach (range(1, 100) as $index) {
            DB::table('clientes')->insert([
                'nome_fantasia' => $faker->company,
                'cnpj' => $faker->unique()->numerify('##.###.###/####-##'), 
                'endereco' => $faker->streetAddress,
                'cidade' => $faker->city,
                'estado' => $faker->state,
                'pais' => 'Brasil',
                'telefone' => $faker->phoneNumber,
                'email' => $faker->email,
                'area_de_atuacao' => $faker->word,
                'quadro_societario' => $faker->optional()->text,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
