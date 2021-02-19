
Aviso de que foi realizado um aditivo de alteração no estágio de {{ $estagio->nome }}, Nº USP {{ $estagio->numero_usp }}, 
na empresa {{ $estagio->empresa->nome }}. O setor de estágios julgou que a alteração realizada necessita de aprovação
do parecerista.
<br><br>
O documento de aditivo segue em anexo, as alteração realizadas no termo ató o momento são: <br><br>

<b>
@foreach($estagio->aditivos as $aditivo)
    - {{ $aditivo->alteracao }} <br><br>
@endforeach
</b>

<br>
Favor entrar em contato com o setor de estágios da fflch, informando sua avaliação relativa a alteração realizada.
<br><br>
Mensagem automática, não responder - FFLCH-USP 


