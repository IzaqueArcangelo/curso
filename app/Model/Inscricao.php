<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    protected $table = 'inscricao'; // TODO especifica o nome da tabela, evitando que o láravel assuma a convenção.
    public $timestamps = false; //TODO remove o gerenciamento automático do láravel created_at e updated_at.

    public function aluno(){
        return $this->belongsTo('App\Model\Aluno', 'id_aluno', 'id');
    }

    public function professor(){
        return $this->belongsTo('App\Model\Professor', 'id_professor', 'id');
    }

    public function curso(){
        return $this->belongsTo('App\Model\Curso', 'id_curso', 'id');
    }

    public function dia(){
        return $this->belongsTo('App\Model\Dia', 'id_dia', 'id');
    }

}
