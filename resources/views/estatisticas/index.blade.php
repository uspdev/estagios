@extends('main') 

@section('content')
@include('flash')

<div class="card">
    <div class="card-header">Estatísticas sobre o Site</div>
    <div class="card-body">

    <form method="get" action="/estatisticas">
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
    <br>

    <b>Total de estágios cadastrados:</b> {{ $total_estagios }} estágios cadastrados<br>
    <b>Total de estágios ativos:</b> {{ $total_ativos }} estágios ativos<br>
    <b>Total de estágios renovados:</b> {{ $total_renovados }} estágios renovados<br>
    <b>Total de estágios rescindidos:</b> {{ $total_rescindidos }} estágios rescindidos<br>
    <b>Total de empresas cadastradas:</b> {{ $total_empresas }} empresas<br><br>

    Informações geradas ás {{ date("H:i"); }} do dia {{ date("d/m/Y")}}; 

    </div>
</div>

@endsection('content')