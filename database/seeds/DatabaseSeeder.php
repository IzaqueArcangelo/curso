<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PerfilSeed::class);
        //$this->call(MesSeed::class);
        $this->call(DiaSeed::class);
        //$this->call(AnoSeed::class);
    }
}
