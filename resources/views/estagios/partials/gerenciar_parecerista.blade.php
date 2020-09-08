@can('admin')

<div class="row">
<div class="col-6 form-group">

<form method="POST" action="/parecer_merito/{{$estagio->id}}">
@csrf
<b>Parecerista:</b> <input type="number" class="form-control" id="numparecerista" name="numparecerista" value="{{old('duracao',$estagio->numparecerista)}}">
@if(($estagio->numparecerista)!=null)
<b>Nome:</b> {{Uspdev\Replicado\Pessoa::dump($estagio->numparecerista)['nompes']}}<br>
<b>Email Cadastrado:</b> {{Uspdev\Replicado\Pessoa::email($estagio->numparecerista)}}</b><br> 
@endif
<button type="submit" class="btn btn-success">Alterar Número</button>
</form>


</div>

<a onClick="return confirm('Tem certeza que deseja um email para o parecerista?')" href="/emails/enviar_para_parecerista/{{$estagio->id}}">
<i class="fas fa-envelope-open-text"></i> </a>
Enviar e-mail com parecer em anexo para o e-mail USP do parecerista


@endcan('admin')