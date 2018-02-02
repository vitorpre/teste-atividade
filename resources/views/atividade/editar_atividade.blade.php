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
Edição de Atividade
@endsection

@section('subtitulo')
{{ $atividade['nome'] }}
@endsection

@section('conteudo')
<div class="box">

    @component( "layouts.alerta_sucesso" , [ "mensagem" => $mensagem ] )
    @endcomponent
    
    <div id="alerta"></div>

    <form id="formularioCadastro" class="form-horizontal" method="post" action="{{ url("atividade/" . $atividade['id'] . "/salvar") }}" >

        @component('atividade.formulario_atividade' , [ "arrAtividadeStatus" => $arrAtividadeStatus , "atividade" => $atividade ] )
        @endcomponent

        <button class="btn btn-primary" type="submit" >Salvar</button>
        <a class="btn btn-secondary" href="{{ url("") }}" >Voltar</a>

    </form>

</div>
@endsection