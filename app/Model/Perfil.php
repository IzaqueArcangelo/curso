<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfil'; // TODO especifica o nome da tabela, evitando que o láravel assuma a convenção.
    public $timestamps = false; //TODO remove o gerenciamento automático do láravel created_at e updated_at.

    public function usuario(){
        return $this->hasMany('App\Model\Usuario', 'id_perfil', 'id');
    }
}
