<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $appends = array('data_inicio_formatada', 'data_fim_formatada' , 'situacao_formatada');

    public function getDataInicioFormatadaAttribute()
    {
        if($this->data_inicio != "")
        {
            return \Carbon\Carbon::parse($this->data_inicio)->format('d/m/Y');  
        }
    }
    
    public function getDataFimFormatadaAttribute()
    {
        if($this->data_fim != "")
        {
            return \Carbon\Carbon::parse($this->data_fim)->format('d/m/Y');  
        }
    }
    
    public function getSituacaoFormatadaAttribute()
    {
        switch ( $this->situacao )
        {
            case 0:
                return "Inativo";
            case 1:
                return "Ativo";                
        }
        
        return \Carbon\Carbon::parse($this->data_inicio)->format('d/m/Y');  
    }

    public function status()
    {   
        return $this->hasOne( AtividadeStatus::class , "id" , "atividade_status_id" );
    }
       
}
