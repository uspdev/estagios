
Aviso de que foi realizado um aditivo de alteração no estágio de {{ $estagio->nome }}, Nº USP {{ $estagio->numero_usp }}, 
na empresa {{ $estagio->empresa->nome }}. O setor de estágios julgou que a alteração realizada necessita de aprovação
do parecerista.
<br><br>
A alteração pendente é a seguinte: <br><br>

@foreach($estagio->aditivos
    ->where('aprovado_graduacao','=',null)
    ->where('comentario_graduacao','!=',null)
    ->where('comentario_parecerista','=',null)
    ->where('aprovado_parecerista','=',null) as $aditivo)
<b>
    - {{ $aditivo->alteracao }} <br><br>
</b>
@endforeach

<br>
Favor entrar no sistema de estágios da {{ $settings->sigla_unidade }} para informar sua avaliação relativa ao pedido de aditivo realizado.
<br><br>
Mensagem automática, não responder - {{ $settings->sigla_unidade }} 


