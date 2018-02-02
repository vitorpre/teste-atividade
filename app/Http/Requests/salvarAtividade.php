<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class salvarAtividade extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome'          => 'required|max:255',
            'descricao'     => 'required|max:600',
            'data_inicio'   => 'required|date',
            'data_fim'      => 'nullable|date',
        ];
    }
    
    public function messages()
    {
        return [
            'message'               => 'Não foi possível salvar a atividade:',            
            'nome.required'         => 'Nome é obrigatório',
            'nome.max'              => 'Nome deve ter no máximo 255 caractéres',
            'descricao.required'    => 'Descrição é obrigatória',
            'descricao.max'         => 'Descrição deve ter no máximo 600 caractéres',
            'data_inicio.required'  => 'Data de início é obrigatória',
            'data_inicio.date'      => 'Data de início deve estar no formato DD/MM/AAAA',
            'data_fim.required'     => 'Data de fim é obrigatória quando o status for concluído',
            'data_fim.date'         => 'Data de início deve estar no formato DD/MM/AAAA',
        ];
    }
    
    public function withValidator(\Illuminate\Validation\Validator $validator)
    {
        $atividadeStatusId = $this->request->get( 'atividade_status_id' ); 
        
        if( $atividadeStatusId == \App\AtividadeStatus::CONCLUIDO )
        {            
            $validator->sometimes('data_fim', 'required', function ($input) {
                return true;
            });
            
        }

    }
}
