@can('admin')

<div class="row">
  <div class="col-4 form-group">
    <b>Gerenciar Parecerista:</b><br><br>
    <form method="POST" action="/parecer_merito/{{$estagio->id}}">
    @csrf
    
    <select name="numparecerista">
        <option value="" selected=""> - Selecione  -</option>
        @foreach (\App\Models\Parecerista::all() as $parecerista)

            @if (old('numparecerista') == '' and isset($estagio->numparecerista))
                <option value="{{$parecerista->numero_usp}}" {{ ( $estagio->numparecerista == $parecerista->numero_usp) ? 'selected' : ''}}>
                    {{$parecerista->numero_usp}} - {{ $parecerista->nome }}
                </option>
            @else
                <option value="{{$parecerista->numero_usp}}" {{ ( old('numparecerista') == $parecerista->numero_usp) ? 'selected' : ''}}>
                    {{$parecerista->numero_usp}} - {{ $parecerista->nome }}
                </option>
            @endif
        
        @endforeach
    </select>

    @if(($estagio->numparecerista)!=null)
        <br>
        <b>Nome:</b> {{ $estagio->parecerista->nome }}<br>
        <b>Email Cadastrado:</b> {{ $estagio->parecerista->email }}</b><br> 
    @endif
    
    <br>
    <button type="submit" class="btn btn-success">Alterar Número</button>
    </form>
  </div>

    <div class="col-4 form-group">
        <b>Gerar Documentos:</b><br><br>

        @if(($estagio->desempenhoacademico)!=null)
            <a href="/pdfs/parecer/{{$estagio->id}}"target="_blank" >
            <i class="fas fa-file-pdf"></i> </a>
            Gerar PDF do Parecer de Mérito 
        @endif

        @if(is_null($estagio->renovacao_parent_id))
            <br>
            <a href="/pdfs/termo/{{$estagio->id}}"target="_blank" >
            <i class="fas fa-file-pdf"></i> </a>
            Gerar PDF do Termo de Ciência 
        @else
            <br>
            <a href="/pdfs/renovacao/{{$estagio->id}}" target="_blank" >
            <i class="fas fa-file-pdf"></i> </a>
            Gerar PDF do Termo de Ciência para Renovação
        @endif    

        @if(($estagio->aditivos)->isNotEmpty())
            <br>
            <a href="/pdfs/aditivo/{{$estagio->id}}" target="_blank" >
            <i class="fas fa-file-pdf"></i> </a>
            Gerar PDF do Parecer de Alteração
        @endif

        <br>
    </div>

    <div class="col-4 form-group">
        <b>Opções de Envio de Email automático:</b><br><br>
        <a onClick="return confirm('Tem certeza que deseja um email para o parecerista?')" href="/emails/enviar_para_parecerista/{{$estagio->id}}">
        <i class="fas fa-envelope-open-text"></i> </a>
        Enviar e-mail com parecer em anexo para o e-mail USP do parecerista

        @if(is_null($estagio->renovacao_parent_id))
            <br>
            <a onClick="return confirm('Tem certeza que deseja um email para a empresa?')" href="/emails/enviar_para_analise_tecnica/{{$estagio->id}}">
            <i class="fas fa-envelope-open-text"></i> </a>
            Enviar E-mail contendo o Termo de Ciência para a empresa   
        @else
            <br>
            <a onClick="return confirm('Tem certeza que deseja um email para a empresa?')" href="/emails/enviar_para_analise_tecnica_renovacao/{{$estagio->id}}">
            <i class="fas fa-envelope-open-text"></i> </a>  
            Enviar E-mail contendo o Termo de Ciência para Renovação para a empresa    
        @endif    

        @if(($estagio->aditivos)->isNotEmpty())
            <br>
            <a onClick="return confirm('Tem certeza que deseja um email para a empresa?')" href="/emails/alteracao_empresa/{{$estagio->id}}">
            <i class="fas fa-envelope-open-text"></i> </a>
            Enviar E-mail contendo as alterações para a empresa.
        @endif

</div>

@if(($estagio->analise_alteracao)!=null)

<div class="row">
    <div class="col-12 form-group">
        <form method="POST" action="/analise_alteracao/{{$estagio->id}}">
            @csrf
            <br><b>Aditivo de Alteração Pendente:</b><br><br>
            
            - {{ $estagio->analise_alteracao }}<br><br>

            <label for="comentario_alteracao">Em caso de indeferimento, especidique o motivo: </label><br>
            <textarea name="comentario_alteracao" rows="5" cols="60"></textarea><br>
            
            <button type="submit" class="btn btn-success" name="analise_alteracao_action" value="deferir_alteracao"
                onClick="return confirm('Tem certeza que deseja deferir o aditivo?')" >
                Deferir Aditivo
            </button>

            <button type="submit" class="btn btn-warning" name="analise_alteracao_action" value="indeferir_alteracao"
                onClick="return confirm('Tem certeza que deseja indeferir o aditivo?')" >
                Indeferir Aditivo
            </button>

            <a class="btn btn-info" href="/emails/alteracao/{{$estagio->id}}" target="_blank" ><i class="fas fa-envelope-open-text"></i>  Enviar email com aditivo pendente para o parecerista</a>
            
        </form>
    </div>
</div>

@endif

@endcan('admin')