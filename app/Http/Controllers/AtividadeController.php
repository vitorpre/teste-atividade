<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



class AtividadeController extends BaseController
{

	
	public function index( \Illuminate\Http\Request $request )
	{
            $mensagem = $request->get("mensagem");
            
            $filtros["situacao"] = $request->get("situacao");
            $filtros["status"] = $request->get("status");
            
            $atividades = \App\Atividade::with( [ "status" ] )->get();
            
            if( $filtros["situacao"] != "" )
            {
                $atividades = $atividades->where( "situacao" , "=" ,  $filtros["situacao"] ) ;
            }
            
            if( $filtros["status"] != "" )
            {
                $atividades = $atividades->where( "atividade_status_id" , "=" , $filtros["status"] ) ;
            }
            
            $arrAtividadeStatus = \App\AtividadeStatus::all();
            
            return view('atividade.listar_atividade' , [ "atividades" => $atividades->toArray() , 
                "arrAtividadeStatus" => $arrAtividadeStatus->toArray() , "mensagem" => $mensagem , "filtros" => $filtros ] );
	}
        
        public function criar()
	{
            $arrAtividadeStatus = \App\AtividadeStatus::all();

            return view('atividade.criar_atividade' , [ "atividade" => null , "arrAtividadeStatus" => $arrAtividadeStatus->toArray() ] );
	}
        
        public function salvar( \App\Http\Requests\salvarAtividade $request )
	{
            $atividade = new \App\Atividade();
            $atividade->fill($request->input());
            
            $atividade->save();

            return response()->json( [ 'msg' => 'Salvo com sucesso!' , 'id' => $atividade->id ] );
	}
        
        public function editar( \App\Atividade $atividade , \Illuminate\Http\Request $request )
	{
            $mensagem = $request->input("mensagem");

            $arrAtividadeStatus = \App\AtividadeStatus::all();

            return view('atividade.editar_atividade' , [ "atividade" => $atividade->toArray() , "arrAtividadeStatus" => $arrAtividadeStatus->toArray() , "mensagem" => $mensagem ] );
	}
        
        public function alterar( \App\Atividade $atividade , \App\Http\Requests\salvarAtividade $request )
	{
            
            $atividade->fill($request->input());
            
            $atividade->save();

            return response()->json( [ 'msg' => 'Salvo com sucesso!' ] );
	}
        
        public function redirecionarAposCriar( \App\Atividade $atividade )
        {
            
            return redirect('atividade/' . $atividade->id .' /editar')->with("mensagem", "Atividade criada com sucesso");
            
        }
        
        

}
