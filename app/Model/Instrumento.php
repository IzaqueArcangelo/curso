<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Instrumento extends Model
{
    protected $table = 'instrumento'; // TODO especifica o nome da tabela, evitando que o láravel assuma a convenção.
    public $timestamps = false; //TODO remove o gerenciamento automático do láravel created_at e updated_at.

    public function cursos(){
       return $this->hasMany('App\Curso', 'id_instrumento', 'id');
    }
}
