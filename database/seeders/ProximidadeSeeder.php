<?php

namespace Database\Seeders;

use App\Models\Proximidade;
use Illuminate\Database\Seeder;

class ProximidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proximidade::create(['nome' => 'Academia']);
        Proximidade::create(['nome' => 'Banco']);
        Proximidade::create(['nome' => 'Shopping']);
        Proximidade::create(['nome' => 'Cinema']);
        Proximidade::create(['nome' => 'Hiper Mercado']);
        Proximidade::create(['nome' => 'Consultório Médico']);
        Proximidade::create(['nome' => 'Escola']);
        Proximidade::create(['nome' => 'Farmácia']);
        Proximidade::create(['nome' => 'Hospital']);
        Proximidade::create(['nome' => 'Panificadora']);
        Proximidade::create(['nome' => 'Parque']);
        Proximidade::create(['nome' => 'Ponto de Ônibus']);
        Proximidade::create(['nome' => 'Ponto de Táxi']);
        Proximidade::create(['nome' => 'Posto de Combustível']);
        Proximidade::create(['nome' => 'Posto Policial']);
        Proximidade::create(['nome' => 'Restaurante']);
        Proximidade::create(['nome' => 'Pizzaria']);
        Proximidade::create(['nome' => 'Terminal']);
        Proximidade::create(['nome' => 'Correios']);
    }
}
