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
        <b>Totais gerais da base de dados e novos estágios criados por curso - Ano de {{$busca_ano}}</b>
        @else
        <b>Totais gerais da base de dados e estágios por curso</b>
        @endif
    </div>

    <div class="row">
            <div class="col-sm form-group">
                <table class="table table-striped">
                    <tr>
                        <th>Estágios cadastrados:</th>
                        <td>{{ $total_estagios }}</td>
                    </tr>
                    @if($busca_ano)
                    <tr>
                        <th>Estágios que estão/estiveram ativos neste ano:</th>
                        <td>{{ $total_concluidos }}</td>
                    </tr>
                    @else
                    <tr>
                        <th>Estágios em andamento:</th>
                        <td>{{ $total_concluidos }}</td>
                    </tr>
                    @endif
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
            </div>
            
            <div class="col-sm form-group">
                <table class="table table-striped">
                    <tr>
                        <th>Estágiarios do curso de Licenciatura em Ciências Sociais:</th>
                        <td>{{ $total_licsociais }}</td> 
                    </tr>
                    <tr>
                        <th>Estágiarios do curso de Bacharelado em Ciências Sociais:</th>
                        <td>{{ $total_bachsociais }}</td> 
                    </tr>
                    <tr>
                        <th>Estágiarios do curso de Licenciatura em Filosofia:</th>
                        <td>{{ $total_licfilosofia }}</td>
                    </tr>
                    <tr>
                        <th>Estágiarios do curso de Bacharelado em Filosofia:</th>
                        <td>{{ $total_bachfilosofia }}</td>
                    </tr>
                    <tr>
                        <th>Estágiarios do curso de Licenciatura em Geografia:</th>
                        <td>{{ $total_licgeografia }}</td>
                    </tr>
                    <tr>
                        <th>Estágiarios do curso de Bacharelado em Geografia:</th>
                        <td>{{ $total_bachgeografia }}</td>
                    </tr>
                    <tr>
                        <th>Estágiarios do curso de Licenciatura em História:</th>
                        <td>{{ $total_lichistoria }}</td>
                    </tr>
                    <tr>
                        <th>Estágiarios do curso de Bacharelado em História:</th>
                        <td>{{ $total_bachhistoria }}</td>
                    </tr>
                    <tr>
                        <th>Estágiarios dos cursos de Licenciatura em Letras:</th>
                        <td>{{ $total_licletras }}</td>
                    </tr>
                    <tr>
                        <th>Estágiarios dos cursos de Bacharelado em Letras:</th>
                        <td>{{ $total_bachletras }}</td>
                    </tr>
                    <tr>
                        <th>Estágiarios do ciclo básico em Letras:</th>
                        <td>{{ $total_basicoletras }}</td>
                    </tr>
                </table>
            </div>
            
        
        </div>

    </div>

    <br> Informações geradas ás {{ date("H:i"); }} do dia {{ date("d/m/Y")}} 
</div>

@endsection('content')