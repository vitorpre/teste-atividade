{{ csrf_field() }}
                    
<input name="id" type="hidden" value="{{ $atividade['id'] }}" >

<div class="form-group row">
  <label class="col-md-2 control-label" for="nome">Nome</label>  
  <div class="col-md-4">
  <input id="nome" name="nome" type="text" placeholder="Nome da atividade" value="{{ $atividade['nome'] }}" class="form-control input-md">
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 control-label" for="descricao">Descrição</label>  
  <div class="col-md-4">
      <textarea id="descricao" name="descricao" placeholder="Descrição da atividade" class="form-control">{{ $atividade['descricao'] }}</textarea>
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 control-label" for="data_inicio">Data de Início</label>  
  <div class="col-md-4">
  <input id="data_inicio" name="data_inicio" type="date" placeholder="Data de ínicio da atividade" value="{{ $atividade['data_inicio'] }}" class="form-control input-md">
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 control-label" for="data_fim">Data de Fim</label>  
  <div class="col-md-4">
  <input id="data_fim" name="data_fim" type="date" placeholder="Data de fim da atividade" value="{{ $atividade['data_fim'] }}" class="form-control input-md">
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 control-label" for="atividade_status_id">Status</label>  
  <div class="col-md-4">
  <select id="atividade_status_id" name="atividade_status_id" class="form-control input-md">
      <option value=""></option>
      @foreach( $arrAtividadeStatus as $atividadeStatus)
        <option value="{{ $atividadeStatus['id'] }}" 
                <?= ( $atividade['atividade_status_id'] == $atividadeStatus['id'] ? "selected='selected'" : "" ) ?> >
            {{ $atividadeStatus['descricao'] }}
        </option>
      @endforeach
  </select>
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 control-label" for="situacao">Situação</label>  
  <div class="col-md-4">
  <select id="situacao" name="situacao" class="form-control input-md">
      <option value="1" <?= ( $atividade['situacao'] == 1 ? "selected='selected'" : "" ) ?>>Ativo</option>
      <option value="0" <?= ( $atividade['situacao'] == 0 ? "selected='selected'" : "" ) ?>>Inativo</option>
  </select>
  </div>
</div>

