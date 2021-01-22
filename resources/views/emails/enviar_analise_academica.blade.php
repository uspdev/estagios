@inject('pessoa','Uspdev\Replicado\Pessoa')


Informamos que o professor parecerista, {{$pessoa::dump($estagio->numparecerista)['nompes']}}, enviou a avaliação de parecer de mérito relativa a seu estágio 
na empresa {{ App\Models\Empresa::where('cnpj',$estagio->cnpj)->first()->nome }} para o setor de estágios.<br><br>

Com base na análise do parecerista, informamos que o estágio foi <b>{{ $estagio->tipodeferimento }}</b>, segue o documento do parecer em anexo.<br><br>

@if($estagio->tipodeferimento == 'Indeferido')

Favor entrar em contato com o professor o mais breve o possível para discutir a situação do seu estágio e o andamento deste.

@else

Nenhuma medida adicional precisa ser tomada neste momento quanto ao estágio. Em caso de eventuais dúvidas, favor entrar em contato com o professor.

@endif    

<br><br>
Mensagem automática - Sistema de Estágios - FFLCH-USP



