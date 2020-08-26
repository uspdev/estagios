
@can('parecerista')

<div class="card">
<div class="card-header"><b>Justificativa da análise acadêmica</b></div>
<div class="card-body">

<ul>
  <li>As atividades propostas no plano de estágio são pertinentes ao curso do(a) aluno(a)?</li>
  <li>Horário é compatível com os horários disponíveis na grade horária do(a) aluno(a? </li>
  <li>Comente sobre o desempenho acadêmico do(a) aluno(a) (coloque a média ponderada) </li>
</ul>

<form method="POST" action="/analise_academica/{{$estagio->id}}">
    @csrf
    <div class="row">
        <div class="form-group">
            <textarea name="analise_academica" rows="5" cols="60">{{old('analise_academica',$estagio->analise_academica)}}</textarea>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-info" name="analise_academica_action" value="indeferimento_analise_academica">Indeferir</button>
        <button type="submit" class="btn btn-success" name="analise_academica_action" value="deferimento_analise_academica">Deferir</button>
    </div>

</form>

@if($estagio->analise_academica)
    <b>último parecer de mérito:</b> {{$estagio->analise_academica}}<br>
    Parecer de mérito realizado por: {{ $estagio->analise_academica_user->name }} <br>
@endif

</div>
</div>

@endcan('parecerista')
