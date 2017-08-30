<?php

use App\Model\Perfil;
use Illuminate\Database\Seeder;

class PerfilSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perfil::create([
            'id' => '1',
            'nome' => 'Administrador',
        ]);

        Perfil::create([
            'id' => '2',
            'nome' => 'Funcionário',
        ]);
    }
}
