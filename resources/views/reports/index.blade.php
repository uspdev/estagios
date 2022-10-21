@extends('main') 

@section('content')
 

<div class="card">
    <div class="card-header"><b>Filtrar relatórios sobre estágios concluídos</b></div>
    <div class="card-body">

        <form method="get" action="/reports">
        @csrf
            Estágios que concluíram entre:
                <input class="datepicker" name="start_date" value="{{ request()->start_date }}"> 
                    e
                <input class="datepicker" name="end_date" value="{{ request()->end_date }}">
                <br><br>
                <select name="curso" class="form-control" style="width: 60%;">
                    <option value="0" selected>Qualquer curso</option>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso }}"> {{ $curso }} </option>
                    @endforeach
                </select>
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
        <td> {{ $estagio->cargahoras }}:{{ $estagio->cargaminutos }}h</td>
        <td> {{ $estagio->empresa->nome }} </td>
        <td> {{ $estagio->data_final }} </td>
    </tr>
    @empty
        <td colspan="7">Sem resultados no momento</td>
@endforelse
</tbody>
</table>
@endif


@endsection('content')