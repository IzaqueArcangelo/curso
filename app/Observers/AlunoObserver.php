<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 05/09/2017
 * Time: 16:49
 */

namespace App\Observers;


use App\Model\Aluno;

class AlunoObserver
{
    /**
     * Listen to the User deleting event.
     *
     * @param  Aluno  $aluno
     * @return void
     */
    public function deleting(Aluno $aluno)
    {
        $aluno->mensalidade()->delete();
        $aluno->endereco()->delete();
    }
}