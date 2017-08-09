<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $table = 'pagamento'; // TODO especifica o nome da tabela, evitando que o láravel assuma a convenção.
    public $timestamps = false; //TODO remove o gerenciamento automático do láravel created_at e updated_at.

    public function ano(){
        return $this->belongsTo('App\Ano', 'ano_referencia', 'id');
    }

    public function mes(){
        return $this->belongsTo('App\Mes', 'mes_referencia', 'id');
    }

    public function mensalidade(){
        return $this->belongsTo('App\Mensalide', 'id_mensalidade', 'id');
    }
}
