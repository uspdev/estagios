@inject('pessoa','Uspdev\Replicado\Pessoa')
<div class="card">
  <div class="card-header"><b>Estagiários/as</b></div>
  <div class="card-body">

    <a href="/estagios/create" class="btn btn-success"> Novo/a estagiário/a </a>
    <br><br>

    <table class="table table-striped">
    <thead>
        <tr>
        <th>Número USP</th>
        <th>Nome</th>
        <th>Período</th>
        <th>Ações</th>      
        </tr>
    </thead>
    <tbody>
        @forelse($estagios as $estagio)
        <tr>

        <td>
        <a href ="/estagios/{{$estagio->id}}">
            {{$estagio->numero_usp}}      
        </a>
        </td>

        <td>
        {{$pessoa::dump($estagio->numero_usp)['nompes'] }}
        </td>

        <td>
        {{$estagio->data_inicial}} - {{$estagio->data_final}}
        </td>

        <td>
        <a href="/estagios/{{$estagio->id}}/edit">
            <i class="fas fa-edit">
        </a></i>
        <a href="/pdfs/termo/{{$estagio->id}}"><i class="fas fa-file-pdf"></i></a>
        </td>   

        </tr>
        <div></div>
        @empty
            <td colspan="4">Sem estagiários/as no momento</td>
        @endforelse
    </tbody>
    </table>
  </div>
</div>