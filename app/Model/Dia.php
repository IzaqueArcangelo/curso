<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    protected $table = 'dia'; // TODO especifica o nome da tabela, evitando que o láravel assuma a convenção.
    public $timestamps = false; //TODO remove o gerenciamento automático do láravel created_at e updated_at.

    public function inscricao(){
        return $this->hasMany('App\Model\Inscricao', 'id_dia', 'id');
    }
}
