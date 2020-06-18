@inject('pessoa','Uspdev\Replicado\Pessoa')

<style>
button {
    background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline: none;
}
</style>

<div class="card">
  <div class="card-header"><b>Estagiários/as</b></div>
  <div class="card-body">

    @can('empresa')
        <a href="/estagios/create" class="btn btn-success"> Novo/a estagiário/a </a>
        <br>
    @endcan('empresa')
    <br>

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
            <div>
            <a href="/estagios/{{$estagio->id}}/edit">
            <i class="fas fa-edit">
            </a></i>

            <a href="/pdfs/termo/{{$estagio->id}}">
            <i class="fas fa-file-pdf">
            </i></a>
        </td>    
        <td>
            <form  method="POST" action="/estagios/{{$estagio->id}}">         
                @csrf
                @method('delete')
                <button class="botao" type="submit"><i class="fas fa-trash-alt"></i></button>
            </form>
            <div>
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