
O conteudo aqui informado se refere a ultima atualização dos aditivos aprovados no estágio de {{ $estagio->nome }}, Nº USP {{ $estagio->numero_usp }}, 
na empresa {{ $estagio->empresa->nome }}.
<br><br>
O documento contendo os aditivos aprovados segue em anexo, as alteração realizadas no termo até o momento são: <br><br>

<b>
@foreach($estagio->aditivos->where('aprovado_graduacao','=',1) as $aditivo)
    - {{ $aditivo->alteracao }} <br><br>
@endforeach
</b>

<br>
Favor entrar em contato com o setor de estágios da fflch em caso de necessidade ou dúvida.
<br><br>
Mensagem automática, não responder - FFLCH-USP 


