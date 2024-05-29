
Aviso de que foi realizado um aditivo de alteração no estágio de {{ $estagio->nome }}, Nº USP {{ $estagio->numero_usp }}, 
na empresa {{ $estagio->empresa->nome }}. O documento contendo o aditivo requisitado segue em anexo.
<br><br>
O seguinte aditivo foi requisitado: <br><br>

@foreach($estagio->aditivos->where('aprovado_graduacao','=',0)->where('comentario_graduacao','=',null) as $aditivo)
<b>
    - {{ $aditivo->alteracao }} <br><br>
</b>
@endforeach

<br>
Favor entrar em contato com o setor de estágios da {{ $settings->sigla_unidade }} em caso de necessidade ou dúvida, o sistema informará a empresa 
via email quando da aprovação ou reprovação do aditivo.
<br><br>
Mensagem automática, não responder - {{ $settings->sigla_unidade }} 


