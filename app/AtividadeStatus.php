<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtividadeStatus extends Model
{
    public $table = "atividade_status";
    public $timestamps = false;
    
    const PENDENTE = 1;
    const EM_DESENVOLVIMENTO = 2;
    const EM_TESTE = 3;
    const CONCLUIDO = 4;

}
