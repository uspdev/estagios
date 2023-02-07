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
        @isset($statusavaliado)
        <th>Status da Avaliação</th>
        @endisset
        <th>Tipo</th>
        <th>Habilitação</th>
        <th>Empresa</th>
        <th>Período</th>
        <th>Status</th>
        <th>Status do Parecer</th>
          @can('admin') <th>Deletar</th> @endcan
        </tr>
    </thead>
    <tbody>

        @forelse($estagios as $estagio)
        <tr>

            <td>
            <a href ="/estagios/{{$estagio->id}}"> {{$estagio->numero_usp}}</a>
            </td>

            <td>
                {{ $estagio->nome }}
            </td>

            @isset($statusavaliado)
                <td>
                    <b>
                    @if($estagio->avaliacao_empresa)
                    Avaliado ({{$estagio->avaliacao_empresa}})
                    @else
                    Não Avaliado
                    @endif
                    </b>
                </td>
            @endisset

            <td>
                @if( empty($estagio->renovacao_parent_id) )
                    Original
                @else
                    Renovação
                @endif
            </td>

            <td>
                {{ $estagio->nomhab }}
            </td>

            <td>
                {{ $estagio->empresa->nome }}
            </td>

            <td>
                {{$estagio->data_inicial}} - {{$estagio->data_final}}
            </td>

            <td>
                {{ $estagio->getStatus()[$estagio->status]['name'] }}
            </td>

            <td>
                @if(empty($estagio->tipodeferimento) )
                    Ainda não realizado
                @else
                    {{$estagio->tipodeferimento}}
                @endif
            </td>
            <td>
              @if($estagio->getStatus()[$estagio->status]['name'] != 'Concluído')
                @can('admin')
                  <form  method="POST" action="/estagios/{{$estagio->id}}">
                    @csrf
                    @method('delete')
                    <button class="botao" type="submit" onclick="return confirm('Tem certeza que deseja deletar?');"><i class="fas fa-trash-alt"></i></button>
                  </form>
                @endcan('admin')
              @endif
            </td>

        </tr>
        @empty
            <td colspan="5">Sem estagiários/as no momento</td>
        @endforelse
    </tbody>
    </table>
<div>
