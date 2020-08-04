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
        <th>Deletar</th>     
        </tr>
    </thead>
    <tbody>
        @forelse($estagios->where('renovacao_parent_id','') as $estagio)
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
    
        <br><b>Renovações:</b>
        @foreach( App\Estagio::where('renovacao_parent_id',$estagio->id)->get() as $renovacao)
            <br>
            <a href ="/estagios/{{$renovacao->id}}">
                {{$renovacao->data_inicial}} - {{$renovacao->data_final}}
            </a>
        @endforeach

        </td>
  
        <td>
            <form  method="POST" action="/estagios/{{$estagio->id}}">         
                @csrf
                @method('delete')
                <button class="botao" type="submit" onclick="return confirm('Tem certeza que deseja deletar?');"><i class="fas fa-trash-alt"></i></button>
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