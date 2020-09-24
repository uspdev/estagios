@inject('pessoa','Uspdev\Replicado\Pessoa')

Segue em anexo o Termo de Ciência para Renovação para a empresa {{ App\Models\Empresa::where('cnpj',$estagio->cnpj)->first()->nome }}, 
relativo ao estágio de {{$pessoa::dump($estagio->numero_usp)['nompes'] }}, Nº USP {{ $estagio->numero_usp }}.

<br><br>
Mensagem automática - Sistema de Estágios - FFLCH-USP



