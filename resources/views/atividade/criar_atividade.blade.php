@extends('layouts.master')

@section('title', 'Atividades')

@section('includes-css')
    @parent

@endsection

@section('includes-js')
    @parent
    <script src="{{ URL::asset("js/atividade/cadastrar_atividade.js") }}"></script>
    
@endsection

@section('titulo')
Cadastro de Atividade
@endsection

@section('conteudo')
    <div class="box">
        <div id="alerta"></div>

        <form id="formularioCadastro" class="form-horizontal" data-tipo-formulario="criar" method="post" 
              action="{{ url("atividade/salvar") }}" data-url-redirecionar="atividade" data-eh-formulario-criar="true" >

            @component('atividade.formulario_atividade' , [ "arrAtividadeStatus" => $arrAtividadeStatus , "atividade" => $atividade ] )
            @endcomponent

            <button class="btn btn-primary" type="submit" >Salvar</button>
            <a class="btn btn-secondary" href="{{ url("") }}" >Voltar</a>

        </form>
        
    </div>

@endsection