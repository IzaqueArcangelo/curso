<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda'; // TODO especifica o nome da tabela, evitando que o láravel assuma a convenção.
    public $timestamps = false; //TODO remove o gerenciamento automático do láravel created_at e updated_at.

    public function dia(){
        return $this->belongsTo('App\Model\Dia', 'dia_semana', 'id');
    }

    public function cursos(){
        return $this->belongsToMany('App\Model\Curso', 'agenda_curso', 'id_agenda', 'id_curso');
    }
}
