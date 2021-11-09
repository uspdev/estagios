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
<b>Média ponderada</b>: {{ $estagio->media_ponderada }}<br><br>
@if ($estagio->VerificarEstagio != 'true')
  Este aluno NÃO possui estágio ativo no sistema.<br>
@else
  Este aluno JÁ POSSUI um estágio ativo no sistema, favor checar a situação em caso este seja um novo estágio.<br>
@endif
<br>