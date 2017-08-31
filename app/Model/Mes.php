<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mes extends Model
{
    protected $table = 'mes'; // TODO especifica o nome da tabela, evitando que o láravel assuma a convenção.
    public $timestamps = false; //TODO remove o gerenciamento automático do láravel created_at e updated_at.

    public function pagamentos(){
        return $this->hasMany('App\Model\Pagamento', 'mes_referencia', 'id');
    }
}
