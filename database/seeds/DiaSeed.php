<?php

use App\Model\Dia;
use Illuminate\Database\Seeder;

class DiaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dia::create([
            'id' => '1',
            'nome' => 'Domingo',
            'cod_dia' => '1',
        ]);
        Dia::create([
            'id' => '2',
            'nome' => 'Segunda',
            'cod_dia' => '2',
        ]);
        Dia::create([
            'id' => '3',
            'nome' => 'Terça',
            'cod_dia' => '3',
        ]);
        Dia::create([
            'id' => '4',
            'nome' => 'Quarta',
            'cod_dia' => '4',
        ]);
        Dia::create([
            'id' => '5',
            'nome' => 'Quinta',
            'cod_dia' => '5',
        ]);
        Dia::create([
            'id' => '6',
            'nome' => 'Sexta',
            'cod_dia' => '6',
        ]);
        Dia::create([
            'id' => '7',
            'nome' => 'Sábado',
            'cod_dia' => '7',
        ]);
    }
}
