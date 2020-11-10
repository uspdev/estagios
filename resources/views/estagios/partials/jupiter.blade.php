<b>Grade horária:</b>
<br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Disciplina</th>
      <th scope="col">Turma</th>
      <th scope="col">Dia da Semana</th>
    </tr>
   </thead>
    <tbody>
        @foreach(\App\Utils\ReplicadoUtils::grade($estagio->numero_usp) as $linha)
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
            </tr>
        @endforeach
    </tbody>
</table>

<b>Periodo de Matrícula</b>: {{ $estagio->periodo() }}<br>
<b>Média ponderada</b>: {{ $estagio->mediaponderada() }}<br>
<br>