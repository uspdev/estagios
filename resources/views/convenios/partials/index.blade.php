<div class="card">
  <div class="card-header"><b>Convênios</b></div>
  <div class="card-body">

    <a href="/convenios/create" class="btn btn-success"> Novo Convênio </a>
    <br><br>
    
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">Nome do Representante</th>
        <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($convenios as $convenio)

            <tr>
            <td><div><a href="/convenios/{{$convenio->id}}">{{$convenio->nome_representante}}</a></div></td>
            <td>
            <a href="/convenios/{{$convenio->id}}/edit"><i class="fas fa-edit"></i></a>
            <a href="/pdfs/convenio/{{$convenio->id}}"><i class="fas fa-file-pdf"></i></a>

        </td>
        <td>
            <form method="POST" action="/convenios/{{$convenio->id}}">
                @csrf
                @method('delete')
                <button type="submit"><i class="fas fa-trash-alt"></i></button>
            
            </form>    
        </td>

        </tr>
        @empty
            <td colspan="2">Não há convênios</td>
        @endforelse

    </tbody>
    </table>
  </div>
</div>