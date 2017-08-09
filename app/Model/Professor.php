<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = 'professor'; // TODO especifica o nome da tabela, evitando que o láravel assuma a convenção.
    public $timestamps = false; //TODO remove o gerenciamento automático do láravel created_at e updated_at.

    public function cursos(){
        return $this->belongsToMany('App\Curso', 'professor_curso', 'id_professor', 'id_curso');
    }
}
