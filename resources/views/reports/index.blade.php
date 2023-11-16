@extends('main')

@section('content')


<div class="card">
    <div class="card-header"><b>Filtrar relatórios sobre estágios concluídos</b></div>
    <div class="card-body">

        <form method="get" action="/report">
        @csrf
            Estágios que concluíram entre:
                <input class="datepicker" name="start_date" value="{{ request()->start_date }}">
                    e
                <input class="datepicker" name="end_date" value="{{ request()->end_date }}">
                <br><br>
                Curso:
                <select name="curso" class="form-control" style="width: 60%;">
                    <option value="0" selected>Qualquer Curso</option>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso }}"> {{ $curso }} </option>
                    @endforeach
                </select>
                <br>
                Parecerista:
                <select name="numparecerista" class="form-control" style="width: 60%;">
                    <option value="0" selected>Selecione o Parecerista</option>
                    @foreach($pareceristas as $parecerista)
                        <option value="{{ $parecerista->numero_usp }}"> {{ \Uspdev\Replicado\Pessoa::obterNome($parecerista->numero_usp) }} </option>
                    @endforeach
                </select>
                <br>
                Empresa:
                <input type="text" class="form-control" name="empresa" value="{{ request()->empresa }}" placeholder="Buscar Nome da Empresa">
                <br>
                Carga Horária:
                <input type="text" class="form-control" name="cargahoras" value="{{ request()->cargahoras }}" placeholder="Carga Horária">
                <br>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-success"> Buscar </button>
                </span>
        </form>
    </div>
</div>

<br>

@if(isset($estagios))
<table class="table table-striped">
<thead>
    <tr>
        <th>Número USP:</th>
        <th>Nome:</th>
        <th>E-mail:</th>
        <th>Curso:</th>
        <th>Parecerista:</th>
        <th>Carga horária:</th>
        <th>Empresa:</th>
        <th>Fim do estágio:</th>
    </tr>
</thead>
@forelse($estagios as $estagio)
<tbody>
    <tr>
        <td> <a href ="/estagios/{{$estagio->id}}"> {{ $estagio->numero_usp}} </a> </td>
        <td> {{ $estagio->nome }} </td>
        <td> {{ $estagio->email }} </td>
        <td> {{ $estagio->nomhab }} </td>
        <td> {{ $estagio->parecerista_nome}} </td>
        <td> {{ $estagio->cargahoras }}:{{ $estagio->cargaminutos }}h</td>
        <td> {{ $estagio->empresa->nome }} </td>
        <td> {{ $estagio->data_final }} </td>
    </tr>
    @empty
        <td colspan="7">Sem resultados no momento</td>
@endforelse
{{ $estagios->appends(request()->query())->links() }}
</tbody>
</table>
@endif


@endsection('content')
