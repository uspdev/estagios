@inject('pessoa','Uspdev\Replicado\Pessoa')

Aviso de que foi realizado um aditivo de alteração no estágio de {{$pessoa::dump($estagio->numero_usp)['nompes'] }}, Nº USP {{ $estagio->numero_usp }}, 
na empresa {{ App\Models\Empresa::where('cnpj',$estagio->cnpj)->first()->nome }}.
<br><br>
O documento de aditivo segue em anexo, a alteração realizada foi: <b>{{$estagio->alteracao}}</b>
<br><br>
Mensagem automática - FFLCH-USP


