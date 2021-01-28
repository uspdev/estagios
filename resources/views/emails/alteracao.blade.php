@inject('pessoa','Uspdev\Replicado\Pessoa')

Aviso de que foi realizado um aditivo de alteração no estágio de {{$pessoa::dump($estagio->numero_usp)['nompes'] }}, Nº USP {{ $estagio->numero_usp }}, 
na empresa {{ App\Models\Empresa::where('cnpj',$estagio->cnpj)->first()->nome }}. O setor de estágios julgou que a alteração realizada necessita de aprovação
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


