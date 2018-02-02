@extends('layouts.master')

@section('title', 'Atividades')

@section('includes-css')
    @parent

@endsection

@section('includes-js')
    @parent
    
@endsection

@section('titulo')
Atividades
@endsection

@section('conteudo')

    <div class="box">       
        <form class="" action="" method="get" >

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th><button type="submit" class="btn btn-link" ><i class="fa fa-filter"></i></button></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>
                            <select name="situacao" class="form-control form-control-sm">
                                <option></option>
                                <option value="1" {{ $filtros['situacao'] == "1" ? "selected='selected'" : "" }} >Ativo</option>
                                <option value="0" {{ $filtros['situacao'] == "0" ? "selected='selected'" : "" }} >Inativo</option>
                            </select>
                        </th>
                        <th>
                            <select name="status" class="form-control form-control-sm">
                                <option></option>
                                @foreach( $arrAtividadeStatus as $atividadeStatus )
                                <option value="{{ $atividadeStatus["id"] }}" {{ $filtros['status'] == $atividadeStatus["id"] ? "selected='selected'" : "" }} >
                                    {{ $atividadeStatus["descricao"] }}
                                </option>
                                @endforeach
                            </select>
                        </th>
                    </tr>

                    <tr>
                        <th></th>
                        <th>Nome</th>
                        <th>Data de Inicio</th>
                        <th>Data de Fim</th>
                        <th>
                            Situação
                        </th>
                        <th>Status</th>
                    </tr>


                </thead>
                <tbody>
                        @foreach($atividades as $atividade)
                        <tr class="{{ $atividade['status']['id'] == \App\AtividadeStatus::CONCLUIDO ? "linhaDesativada" : "" }}">
                            <td><a href="{{ url("atividade/" . $atividade['id'] . "/editar") }}" class="botaoTabela"><i class="fa fa-edit"></i></a></td>
                            <td>{{ $atividade['nome'] }}</td>
                            <td>{{ $atividade['data_inicio_formatada'] }}</td>
                            <td>{{ $atividade['data_fim_formatada'] }}</td>
                            <td>{{ $atividade['situacao_formatada'] }}</td>
                            <td>{{ $atividade['status']['descricao'] }}</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>

        </form>

        <a href="{{ url("atividade/criar") }}" class="btn btn-primary">Criar nova atividade</a>
        
    </div>
    

@endsection