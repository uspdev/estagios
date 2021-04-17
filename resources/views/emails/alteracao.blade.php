
Aviso de que foi realizado um aditivo de alteração no estágio de {{ $estagio->nome }}, Nº USP {{ $estagio->numero_usp }}, 
na empresa {{ $estagio->empresa->nome }}. O setor de estágios julgou que a alteração realizada necessita de aprovação
do parecerista.
<br><br>
A alteração pendente é a seguinte: <br><br>

@foreach($estagio->aditivos->where('aprovado_graduacao','=',0)->where('comentario_graduacao','=',null) as $aditivo)
<b>
    - {{ $aditivo->alteracao }} <br><br>
</b>
@endforeach

<br>
Favor entrar em contato com o setor de estágios da fflch, informando sua avaliação relativa a alteração realizada.
<br><br>
Mensagem automática, não responder - FFLCH-USP 


