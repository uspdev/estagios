<br>
<div style="text-align: center;"><b>Aviso Importante:</b> O termo deve ser entregue assinado para a instituição no mínimo 10 dias úteis antes do início do estágio no email estagiosfflch@usp.br</div>
<br>

@can('admin')

<div class="card">
<div class="card-header"><b>Justificativa da análise técnica</b></div>
<div class="card-body">

<form method="POST" action="/analise_tecnica/{{$estagio->id}}">
    @csrf
    <div class="row">
        <div class="form-group">
            <textarea name="analise_tecnica" rows="5" cols="60">{{old('analise_tecnica',$estagio->analise_tecnica)}}</textarea>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-info" name="analise_tecnica_action" value="indeferimento_analise_tecnica">
            Devolver para empresa
        </button>

        <button type="submit" class="btn btn-success" name="analise_tecnica_action" value="enviar_assinatura"
            onClick="return confirm('Tem certeza que quer enviar para Assinatura?')" >
            Enviar para assinatura
        </button>

        <button type="submit" class="btn btn-success" name="analise_tecnica_action" value="deferimento_analise_tecnica"
            onClick="return confirm('Tem certeza que quer enviar para Parecer?')" >
            Enviar para parecerista
        </button>
        
        <button type="submit" class="btn btn-warning" name="analise_tecnica_action" value="concluir">Concluir Estágio </button>
    </div>


</form>

<div class="card">
    <div class="card-header"><b>Gerenciar Parecerista</b></div> 
      <div class="card-body">
        @include('estagios.partials.gerenciar_parecerista')
      </div>
    </div>
</div>
<br><br>

@endcan('admin')
<br>

@if(!empty($estagio->analise_academica))
    <b>Parecerista:</b> {{App\Models\User::find($estagio->analise_academica_user_id)->name}} <br>
    <b>Parecer de Mérito:</b> {{$estagio->analise_academica}}<br>
@endif

<br>

</div>  
</div>
