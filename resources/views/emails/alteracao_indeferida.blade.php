
Aviso de que o pedido de aditivo de alteração no estágio de {{ $estagio->nome }}, Nº USP {{ $estagio->numero_usp }}, foi 
indeferido pelo setor de estágios da FFLCH - USP
<br><br>

@foreach($estagio->aditivos->where('aprovado_graduacao','=',0)->where('comentario_graduacao','!=',null) as $aditivo)
@if($loop->last)

Aditivo que havia sido requisitado: <b>{{ $aditivo->alteracao }}</b><br><br>

Comentário do setor de estágios: <b>{{ $aditivo->comentario_graduacao }}</b><br><br>

@if(($aditivo->comentario_parecerista)!=null)
Análise do Parecerista sobre o Aditivo: <b>{{ $aditivo->comentario_parecerista }}</b><br><br>
@endif

@endif
@endforeach

<br><br>
Favor entrar em contato com o setor de estágios da fflch em caso de duvidas sobre a ação.
<br><br>
Mensagem automática, não responder - FFLCH-USP 


