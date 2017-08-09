<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'aluno'; // TODO especifica o nome da tabela, evitando que o láravel assuma a convenção.
    public $timestamps = false; //TODO remove o gerenciamento automático do láravel created_at e updated_at.

    public function endereco(){
        return $this->belongsTo('App\Endereco', 'id_endereco', 'id');
    }

    public function cursos(){
        return $this->belongsToMany('App\Curso', 'inscricao', 'id_aluno', 'id_curso')
        ->withPivot('dataInscricao', 'dataCancelamento', 'id_mensalidade');
    }

    public function mensalidade(){
        return $this->belongsTo('App\Mensalidade', 'id_mensalidade', 'id');
    }
}
