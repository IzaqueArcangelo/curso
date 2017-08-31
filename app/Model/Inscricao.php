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

    public function curso(){
        return $this->belongsTo('App\Model\Curso', 'id_curso', 'id');
    }

    public function mensalidade(){
        $this->belongsTo('App\Model\Mensalidade', 'id_mensalidade', 'id');
    }
}
