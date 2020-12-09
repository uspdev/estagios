<div style="text-align: center;"><h3><b>Estágio Cancelado</b></h3></div>

    @can('admin')
    <br><br>
    <a class="btn btn-warning" onClick="return confirm('Tem certeza que deseja reativar o estágio?')" href="/cancelar_cancelamento/{{$estagio->id}}">
        Reativar Estágio </a>

    @endcan

