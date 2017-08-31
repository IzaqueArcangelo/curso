<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    protected $table = 'dia'; // TODO especifica o nome da tabela, evitando que o láravel assuma a convenção.
    public $timestamps = false; //TODO remove o gerenciamento automático do láravel created_at e updated_at.

    public function agenda(){
        return $this->hasMany('App\Model\Agenda', 'dia_semana', 'id');
    }
}
