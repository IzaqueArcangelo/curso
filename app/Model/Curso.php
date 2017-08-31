<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'curso'; // TODO especifica o nome da tabela, evitando que o láravel assuma a convenção.
    public $timestamps = false; //TODO remove o gerenciamento automático do láravel created_at e updated_at.

    public function instrumento(){
        return $this->belongsTo('App\Model\Instrumento', 'id_instrumento', 'id');
    }

    public function agendas(){
        return $this->belongsToMany('App\Model\Agenda', 'agenda_curso', 'id_curso', 'id_agenda');
    }

    public function professores(){
        return $this->belongsToMany('App\Model\Professor', 'professor_curso', 'id_curso', 'id_professor');
    }

    public function alunos(){
        return $this
            ->belongsToMany('App\Model\Aluno', 'inscricao', 'id_curso', 'id_aluno')
            ->withPivot('dataInscricao', 'dataCancelamento', 'id_mensalidade');
    }
}
