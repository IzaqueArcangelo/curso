<?php

use App\Model\Ano;
use App\Model\Dia;
use Illuminate\Database\Seeder;

class AnoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ano::create([
            'id' => '1',
            'ano' => '2016',
        ]);
        Ano::create([
            'id' => '2',
            'ano' => '2017',
        ]);
        Ano::create([
            'id' => '3',
            'ano' => '2018',
        ]);
        Ano::create([
            'id' => '4',
            'ano' => '2019',
        ]);
        Ano::create([
            'id' => '5',
            'ano' => '2020',
        ]);
    }
}
