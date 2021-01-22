@inject('pessoa','Uspdev\Replicado\Pessoa')

Aviso de que a avaliação de estágio de {{$pessoa::dump($estagio->numero_usp)['nompes'] }}, Nº USP {{ $estagio->numero_usp }}, 
na empresa {{ App\Models\Empresa::where('cnpj',$estagio->cnpj)->first()->nome }} foi enviada para o sistema de estágios para avaliação final do parecerista.
<br><br>
Favor avaliar o caráter do relatório de estágio no site estagios.fflch.usp.br, sob a opção Meus Pareceres.
<br><br>
Mensagem automática - FFLCH-USP 


