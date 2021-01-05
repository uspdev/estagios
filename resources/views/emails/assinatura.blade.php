@inject('pessoa','Uspdev\Replicado\Pessoa')

Aviso de que o estágio de {{$pessoa::dump($estagio->numero_usp)['nompes'] }}, Nº USP {{ $estagio->numero_usp }}, 
na empresa {{ App\Models\Empresa::where('cnpj',$estagio->cnpj)->first()->nome }}, foi aprovado em análise técnica pelo
setor de estágios da FFLCH-USP.
<br><br>
Favor coletar as assinaturas necessárias e enviar o termo para o setor de estágios da FFLCH pelo email estagiosfflch@usp.br em até 10 dias úteis antes do início do estágio.
<br><br>
Mensagem automática - Sistema de Estágios - FFLCH-USP


