@extends('main') 

@section('content')
@include('flash')

<div class="card">
    <div class="card-header"><b>Filtrar estatísticas sobre o sistema</b></div>
    <div class="card-body">

    <form method="get" action="/estatisticas">
    @csrf
        <div class="row">
            <div class=" col-2 input-group">
            <input type="text" maxlength="4" class="form-control" name="busca_ano" value="{{Request()->busca_ano}}" placeholder="Busca por ano (ex: 2020)"
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">  

            <span class="input-group-btn">
                <button type="submit" class="btn btn-success"> Buscar </button>
            </span>
            </div>
        </div>
    </form>
    </div>
</div>

<br>

<div class="card">
    <div class="card-header">    
        @if($busca_ano)
        <b>Totais gerais da base de dados - Ano de {{$busca_ano}}</b>
        @else
        <b>Totais gerais da base de dados</b>
        @endif
    </div>

    <div class="card-body">
        <table class="table table-striped" style="width:25%">
            <tr>
                <th>Estágios cadastrados:</th>
                <td>{{ $total_estagios }}</td>
            </tr>
            <tr>
                <th>Estágios em andamento:</th>
                <td>{{ $total_concluidos }}</td>
            </tr>
            <tr>
                <th>Estágios renovados:</th>
                <td>{{ $total_renovados }}</td>
            </tr>
            <tr>
                <th>Estágios rescindidos:</th>
                <td>{{ $total_rescindidos }} </td>
            </tr>
            <tr>
                <th>Empresas cadastradas:</th>
                <td>{{ $total_empresas }}</td>
            </tr>
        </table>
        
        <br>
        Informações geradas ás {{ date("H:i"); }} do dia {{ date("d/m/Y")}}; 

    </div>
</div>

@endsection('content')