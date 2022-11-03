<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Data</th>
      <th scope="col">Usuário(a)</th>
      <th scope="col">Campos alterados</th>
      <th scope="col">Alterações</th>
    </tr>
  </thead>
  <tbody>
  @foreach($model->audits->sortByDesc('created_at') as $field => $audit)
    <tr>
      <td> {{ \Carbon\Carbon::parse($audit->getMetadata()['audit_created_at'])->format('d/m/Y H:i') }} </td>

      @if(($estagio->cnpj) == ($audit->getMetadata()['user_name']))
        <td> {{ $estagio->empresa->nome }} </td>
      @else
        <td> {{ $audit->getMetadata()['user_name'] }}</td>
      @endif

      <td>
        @foreach($audit->getModified() as $field2 => $modified)
          @if($field)
            <b>{{ $estagio->mapeamento($field2) }}: </b> {{ $modified['old'] }} <br>
          @endif
        @endforeach
      </td>

      <td>
        @foreach($audit->getModified() as $field => $modified)
          @if($field)
            <b>{{ $estagio->mapeamento($field) }}:</b> {{ $modified['new'] }}<br>
          @endif
        @endforeach
      </td>
    </tr>
  @endforeach
  </tdoby>
</table>
