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

    public function inscricoes(){
        return $this
            ->belongsToMany('App\Model\Inscricao', 'inscricao', 'id_curso', 'id')
            ->withPivot('dataInscricao', 'dataCancelamento',  'horaInicio', 'horaTermino', 'id_dia');
    }

    public function professores(){
        return $this->belongsToMany('App\Model\Professor', 'professor_curso', 'id_curso', 'id_professor');
    }

    public function alunos(){
        return $this
            ->belongsToMany('App\Model\Aluno', 'inscricao', 'id_curso', 'id_aluno')
            ->withPivot('dataInscricao', 'dataCancelamento',  'horaInicio', 'horaTermino', 'id_dia');
    }
}
