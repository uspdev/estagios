@can('admin')

<div class="card">
    <div class="card-header"><b>Ações</b></div> 
    <div class="card-body">
        <a class="btn btn-success" onClick="return confirm('Tem certeza que deseja retornar o estágio para a análise técnica?')" href="/retornar_assinatura/{{$estagio->id}}">
        <i class="fas fa-undo"></i> 
        Retornar estágio para análise técnica </a> <br>
    </div>
</div>

<div class="card">
    <div class="card-header"><b>Gerenciar Parecerista</b></div> 
      <div class="card-body">
        @include('estagios.partials.gerenciar_parecerista')
      </div>
    </div>
</div>    

@endcan('admin')