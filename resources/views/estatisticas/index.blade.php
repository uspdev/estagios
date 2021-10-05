@extends('main') 

@section('content')
@include('flash')

<div class="card">
    <div class="card-header"><b>Filtrar estatísticas sobre o sistema</b></div>
    <div class="card-body">

        <form method="get" action="/estatisticas">
        @csrf
            Estágios que iniciaram entre:
            <div class="row">
                <input class="datepicker" name="start_date" value="{{ request()->start_date }}"> 
                    e
                <input class="datepicker" name="end_date" value="{{ request()->end_date }}">

                <select name="curso" class="form-select">
                    <option value="0" selected>Qualquer curso</option>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso }}"> {{ $curso }} </option>
                    @endforeach
                </select>

                <span class="input-group-btn">
                    <button type="submit" class="btn btn-success"> Buscar </button>
                </span>
            </div>
        </form>
    </div>
</div>

<br>

@if(isset($estagios))
<div class="card">
    <div class="card-header">    
    </div>

    <div class="row">
    <div class="col-sm form-group">
                <table class="table table-striped">
                    <tr>
                        <th>Estágios cadastrados:</th>
                        <td> {{ $estagios->whereNotIn('status',['em_elaboracao','cancelado'])->count() }} </td>
                    </tr>
                            
                    <tr>
                        <th>Estágios em andamento:</th>
                        <td>{{ $estagios->whereNotIn('status',['em_elaboracao','cancelado', 'rescisao'])->count() }} </td>
                    </tr>

                    <tr>
                        <th>Estágios renovados:</th>
                        <td> {{ $estagios->where('renovacao_parent_id')->count() }} </td>
                    </tr>
                    <tr>
                        <th>Estágios rescindidos:</th>
                        <td>  {{ $estagios->where('status','rescisao')->count() }} </td>
                    </tr>
                    <tr>
                        <th>Estágios com parecer de mérito deferido:</th>
                        <td>  {{ $estagios->where('tipodeferimento','Deferido')->count() }} </td>
                    </tr>
                    <tr>
                        <th>Estágios com parecer de mérito deferido com restrições:</th>
                        <td>  {{ $estagios->where('tipodeferimento','Deferido com Restrição')->count() }} </td>
                    </tr>
                    <tr>
                        <th>Estágios com parecer de mérito indeferido:</th>
                        <td>  {{ $estagios->where('tipodeferimento','Indeferido')->count() }} </td>
                    </tr>

                </table>
            </div>            

    </div>

    <br> Informações geradas ás {{ date("H:i"); }} do dia {{ date("d/m/Y")}} 
</div>
@endif
@endsection('content')