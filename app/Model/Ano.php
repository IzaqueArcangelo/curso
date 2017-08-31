<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ano extends Model
{
    protected $table = 'ano'; // TODO especifica o nome da tabela, evitando que o láravel assuma a convenção.
    public $timestamps = false; //TODO remove o gerenciamento automático do láravel created_at e updated_at.

    public function pagamentos(){
        return $this->hasMany('App\Model\Pagamento', 'ano_referencia', 'id');
    }
}
