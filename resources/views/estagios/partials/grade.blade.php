
<table class="table">
  <thead>
    <tr>
      <th scope="col">Disciplina</th>
      <th scope="col">Turma</th>
      <th scope="col">Dia</th>
    </tr>
   </thead>
    <tbody>
        @foreach(\App\Utils\ReplicadoUtils::grade(11284280) as $linha)
            <tr>
                <td>{{ $linha['coddis'] }} </td>
                <td>{{ $linha['codtur'] }} </td>
                <td>{{ $linha['diasmnocp'] }} </td>
            </tr>
        @endforeach
    </tbody>
</table>
<br>