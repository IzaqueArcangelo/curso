<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mensalidade extends Model
{
    protected $table = 'mensalidade'; // TODO especifica o nome da tabela, evitando que o láravel assuma a convenção.
    public $timestamps = false; //TODO remove o gerenciamento automático do láravel created_at e updated_at.

    public function aluno(){
        return $this->hasOne('App\Aluno', 'id_mensalidade','id');
    }

    public function inscricoes(){
        return $this->hasMany('App\Inscricao', 'id_mensalidade', 'id');
    }

    public function pagamentos(){
        return $this->hasMany('App\Pagamento', 'id_mensalidade', 'id');
    }
}
