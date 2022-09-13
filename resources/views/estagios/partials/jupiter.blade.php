<b>Grade horária:</b>
<br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Disciplina</th>
      <th scope="col">Turma</th>
      <th scope="col">Dia da Semana</th>
      <th scope="col">Horário da Aula</th>
    </tr>
   </thead>
    <tbody>
        @foreach($estagio->grade as $linha)
            <tr>
                <td>{{ $linha['coddis'] }} </td>
                <td>{{ $linha['codtur'] }} </td>
                <td>
                    @switch($linha['diasmnocp'])
                      @case ('seg')
                      Segunda-feira
                      @break
                      @case ('ter')
                      Terça-feira
                      @break
                      @case ('qua')
                      Quarta-feira
                      @break
                      @case ('qui')
                      Quinta-feira
                      @break
                      @case ('sex')
                      Sexta-feira
                      @break
                      @case ('sab')
                      Sábado
                      @break
                    @endswitch 
                </td>
                <td>{{ $linha['horent'] }} - {{ $linha['horsai'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<b>Periodo de Matrícula</b>: {{ $estagio->periodo }}<br>
<b>Média ponderada</b>: {{ $estagio->media_ponderada }}<br>
<div class="alert alert-info" role="alert"><b>Situação sobre Estágio USP</b>: 
@if ($estagio->VerificarEstagio != 'true')
  Este estudante NÃO possui nenhum estágio USP ativo no sistema.<br>
@else
  Este estudante JÁ POSSUI um estágio USP ativo no sistema, favor checar a situação do aluno em caso este seja um novo estágio ou em processo de aprovação.<br>
  <b>Data final do estágio vigente:<b> {{$estagio->data_final}}
@endif
</div>
<br>
