<?php

use App\Model\Mes;
use Illuminate\Database\Seeder;

class MesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mes::create([
            'id' => '1',
            'nome' => 'Janeiro',
            'cod_mes' => '1',
        ]);
        Mes::create([
            'id' => '2',
            'nome' => 'Fevereiro',
            'cod_mes' => '2',
        ]);
        Mes::create([
            'id' => '3',
            'nome' => 'Março',
            'cod_mes' => '3',
        ]);
        Mes::create([
            'id' => '4',
            'nome' => 'Abril',
            'cod_mes' => '4',
        ]);
        Mes::create([
            'id' => '5',
            'nome' => 'Maio',
            'cod_mes' => '5',
        ]);
        Mes::create([
            'id' => '6',
            'nome' => 'Junho',
            'cod_mes' => '6',
        ]);
        Mes::create([
            'id' => '7',
            'nome' => 'Julho',
            'cod_mes' => '7',
        ]);
        Mes::create([
            'id' => '8',
            'nome' => 'Agosto',
           'cod_mes' => '8',
        ]);
        Mes::create([
            'id' => '9',
            'nome' => 'Setembro',
            'cod_mes' => '9',
        ]);
        Mes::create([
            'id' => '10',
            'nome' => 'Outubro',
            'cod_mes' => '10',
        ]);
        Mes::create([
            'id' => '11',
            'nome' => 'Novembro',
            'cod_mes' => '11',
        ]);
        Mes::create([
            'id' => '12',
            'nome' => 'Dezembro',
            'cod_mes' => '12',
        ]);


    }
}
