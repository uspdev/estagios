@can('admin')

<div class="row">
  <div class="col-6 form-group">

    <form method="POST" action="/parecer_merito/{{$estagio->id}}">
    @csrf
    
    
    <select name="numparecerista">
        <option value="" selected=""> - Selecione  -</option>
        @foreach (App\Models\Parecerista::all() as $parecerista)

            @if (old('numparecerista') == '' and isset($estagio->numparecerista))
                <option value="{{$parecerista->numero_usp}}" {{ ( $estagio->numparecerista == $parecerista->numero_usp) ? 'selected' : ''}}>
                    {{$parecerista->numero_usp}} - {{Uspdev\Replicado\Pessoa::nomeCompleto($parecerista->numero_usp)}}
                </option>
            @else
                <option value="{{$parecerista->numero_usp}}" {{ ( old('numparecerista') == $parecerista->numero_usp) ? 'selected' : ''}}>
                    {{$parecerista->numero_usp}} - {{Uspdev\Replicado\Pessoa::nomeCompleto($parecerista->numero_usp)}}
                </option>
            @endif
        
        @endforeach
    </select>

    @if(($estagio->numparecerista)!=null)
        <br>
        <b>Nome:</b> {{Uspdev\Replicado\Pessoa::dump($estagio->numparecerista)['nompes']}}<br>
        <b>Email Cadastrado:</b> {{Uspdev\Replicado\Pessoa::email($estagio->numparecerista)}}</b><br> 
    @endif
    
    <br>
    <button type="submit" class="btn btn-success">Alterar Número</button>
    </form>
  </div>

  <div class="col-6 form-group">
    <a onClick="return confirm('Tem certeza que deseja um email para o parecerista?')" href="/emails/enviar_para_parecerista/{{$estagio->id}}">
    <i class="fas fa-envelope-open-text"></i> </a>
    Enviar e-mail com parecer em anexo para o e-mail USP do parecerista

    @if(($estagio->desempenhoacademico)!=null)
        <br>
        <a href="/pdfs/parecer/{{$estagio->id}}"target="_blank" >
        <i class="fas fa-file-pdf"></i> </a>
        Gerar PDF do Parecer de Mérito 
    @endif

    @if(is_null($estagio->renovacao_parent_id))
        <br>
        <a onClick="return confirm('Tem certeza que deseja um email para a empresa?')" href="/emails/enviar_para_analise_tecnica/{{$estagio->id}}">
        <i class="fas fa-envelope-open-text"></i> </a>
        Enviar E-mail contendo o Termo de Ciência para a empresa   
        <br>
        <a href="/pdfs/termo/{{$estagio->id}}"target="_blank" >
        <i class="fas fa-file-pdf"></i> </a>
        Gerar PDF do Termo de Ciência 
    @else
        <br>
        <a onClick="return confirm('Tem certeza que deseja um email para a empresa?')" href="/emails/enviar_para_analise_tecnica_renovacao/{{$estagio->id}}">
        <i class="fas fa-envelope-open-text"></i> </a>  
        Enviar E-mail contendo o Termo de Ciência para Renovação para a empresa    
        <br>
        <a href="/pdfs/renovacao/{{$estagio->id}}" target="_blank" >
        <i class="fas fa-file-pdf"></i> </a>
        Gerar PDF do Termo de Ciência para Renovação
    @endif    

    @if(($estagio->aditivos)->isNotEmpty())
        <br>
        <a onClick="return confirm('Tem certeza que deseja um email para o parecerista?')" href="/emails/alteracao/{{$estagio->id}}">
        <i class="fas fa-envelope-open-text"></i> </a>
        Enviar E-mail contendo a alteração para o parecerista.
        <br>
        <a href="/pdfs/aditivo/{{$estagio->id}}" target="_blank" >
        <i class="fas fa-file-pdf"></i> </a>
        Gerar PDF do Parecer de Alteração
    @endif

<br>
  </div>

  



@endcan('admin')