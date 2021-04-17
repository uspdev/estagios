
Aviso de que o pedido de aditivo de alteração no estágio de {{ $estagio->nome }}, Nº USP {{ $estagio->numero_usp }}, foi 
indeferido pelo setor de estágios da FFLCH - USP
<br><br>

@foreach($estagio->aditivos->where('aprovado_graduacao','=',0)->where('comentario_graduacao','!=',null) as $aditivo)

Aditivo que havia sido requisitado: <b>{{ $aditivo->alteracao }}</b><br><br>

Motivo do indeferimento: <b>{{ $aditivo->comentario_graduacao }}</b>

@endforeach

<br><br>
Favor entrar em contato com o setor de estágios da fflch em caso de duvidas sobre a ação.
<br><br>
Mensagem automática, não responder - FFLCH-USP 


