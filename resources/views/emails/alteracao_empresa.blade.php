
Aviso de que foi realizado um aditivo de alteração no estágio de {{ $estagio->nome }}, Nº USP {{ $estagio->numero_usp }}, 
na empresa {{ $estagio->empresa->nome }}.
<br><br>
O documento de aditivo segue em anexo, as alteração realizadas no termo até o momento são: <br><br>

<b>
@foreach($estagio->aditivos->where('aprovado_graduacao','=',1) as $aditivo)
    - {{ $aditivo->alteracao }} <br><br>
@endforeach
</b>

<br>
Favor entrar em contato com o setor de estágios da fflch em caso de necessidades ou dúvidas.
<br><br>
Mensagem automática, não responder - FFLCH-USP 


