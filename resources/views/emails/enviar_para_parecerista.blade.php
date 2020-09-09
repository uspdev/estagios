@inject('pessoa','Uspdev\Replicado\Pessoa')

Segue em anexo o parecer de mérito relativo ao estágio de {{$pessoa::dump($estagio->numero_usp)['nompes'] }}, Nº USP {{ $estagio->numero_usp }}<br><br>

Parecer Realizado por: {{$pessoa::dump($estagio->numparecerista)['nompes']}} <br><br>

Link para a página do estágio: https://estagios.fflch.usp.br/estagios/{{$estagio->id}}



<br><br>
Mensagem automática - Sistema de Estágios - FFLCH-USP



