@can('admin')
      <div class="card">
          <div class="card-header"><b>Área de Administrador</b></div> 
            <div class="card-body">
              @include('estagios.partials.gerenciar_parecerista')
            </div>
          </div>
      </div>
    <br>
    <form method="POST" action="/mover_analise_tecnica/{{$estagio->id}}">
    @csrf
        <button type="submit" class="btn btn-info" name="rescisao_action" value="rescisao"
                onClick="return confirm('Tem certeza que deseja mover estágio para análise técnica?')" >
                Mover estágio para análise técnica
        </button>   
    </form>

@endcan

@can('admin_ou_empresa',$estagio->cnpj)

<br>
<div>

    <div class="card">
    <div class="card-header"><b>EM CASO DE RESCISÃO</b></div>
    <div class="card-body">

    <form method="POST" action="/rescisao/{{$estagio->id}}">
    @csrf
        <div class="form-group">
            <label for="rescisao_motivo" class="required"><b>Justificativa: </b></label><br>
            <textarea name="rescisao_motivo" rows="5" cols="60">{{old('rescisao_motivo',$estagio->rescisao_motivo)}}</textarea>
        </div>
        <div class="form-group">
            <label for="rescisao_data" class="required"><b>Data de Rescisão: </b></label>
            <input type="text" class="form-control datepicker" name="rescisao_data">{{old('rescisao_data',$estagio->rescisao_data)}}</textarea>
        </div>
    <button type="submit" class="btn btn-success" name="rescisao_action" value="rescisao"
            onClick="return confirm('Tem certeza que deseja rescindir o estágio?')" >
            Enviar Pedido de Rescisão
    </button>   
    </form>
    </div></div> <br>

    <div class="card">
    <div class="card-header"><b>EM CASO DE RENOVAÇÃO</b></div>
    <div class="card-body">

    
    <form method="POST" action="/renovacao/{{$estagio->id}}">
    @csrf
    <button type="submit" class="btn btn-info" name="rescisao_action" value="rescisao"
            onClick="return confirm('Tem certeza que deseja renovar o estágio?')" >
            Enviar Pedido de Renovação
    </button>   
    </form>
    
    </div></div> <br>

    <div class="card">
    <div class="card-header"><b>EM CASO DE ALTERAÇÃO</b></div>
    <div class="card-body">

    <a href="/iniciar_alteracao/{{$estagio->id}}" class="btn btn-info" onClick="return confirm('Tem certeza que deseja iniciar o processo de alterações?')">Solicitar Aditivo de Alterações</a>

    </div></div> <br>

</div>
@endcan


