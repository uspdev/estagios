<!-- Area de aprovação de aditivos do parecerista -->

@can('parecerista')
@foreach($estagio->aditivos
    ->where('aprovado_graduacao','===',null)
    ->where('comentario_graduacao','!=',null)
    ->where('comentario_parecerista','=',null)
    ->where('aprovado_parecerista','=',null) as $aditivo)

        <div class="card">
            <div class="card-header"><b>Aditivo pendente de análise pelo parecerista</b></div> 
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 form-group">
                            <form method="POST" action="/analise_alteracao/{{$aditivo->id}}">
                                @csrf
                                <b>Aditivo de Alteração Pendente:</b> {{ $aditivo->alteracao }}<br><br>

                                <b>Comentário do setor de graduação sobre o aditivo:</b> {{ $aditivo->comentario_graduacao }}<br><br>

                                <label for="comentario_parecerista">Favor especificar motivo do deferimento/indeferimento: </label><br>
                                <textarea name="comentario_parecerista" rows="5" cols="60"></textarea><br>
                                
                                <button type="submit" class="btn btn-success" name="analise_alteracao_action" value="parecerista_deferir_alteracao"
                                    onClick="return confirm('Tem certeza que deseja deferir o aditivo?')" >
                                    Deferir Aditivo
                                </button>

                                <button type="submit" class="btn btn-warning" name="analise_alteracao_action" value="parecerista_indeferir_alteracao"
                                    onClick="return confirm('Tem certeza que deseja indeferir o aditivo?')" >
                                    Indeferir Aditivo
                                </button>

                            </form>
                        </div>
                    </div>
            </div></div> 
               
                            
@endforeach
@endcan('parecerista')

<!-- Area do administrador -->

@can('admin')
<div class="card">
    <div class="card-header"><b>Área de Administrador</b></div> 
      <div class="card-body">
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
                    <b>Nome:</b> {{ $estagio->parecerista_nome }}<br>
                    <b>Email Cadastrado:</b> {{ $estagio->parecerista_email }}</b><br> 
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
                        Gerar PDF dos Documentos de Estágio
                    @else
                        <br>
                        <a href="/pdfs/renovacao/{{$estagio->id}}" target="_blank" >
                        <i class="fas fa-file-pdf"></i> </a>
                        Gerar PDF dos Documentos de Estágio para Renovação
                    @endif    

                    @if(($estagio->aditivos)->isNotEmpty())
                        <br>
                        <a href="/pdfs/aditivo/{{$estagio->id}}" target="_blank" >
                        <i class="fas fa-file-pdf"></i> </a>
                        Gerar PDF do Parecer de Alteração
                    @endif

                    @if(($estagio->status)=='rescisao')
                        <br>
                        <a href="/pdfs/rescisao/{{$estagio->id}}" target="_blank" >
                        <i class="fas fa-file-pdf"></i> </a>
                        Gerar PDF do Termo de Rescisão
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
                        Enviar E-mail contendo o Termo de Ciência para a empresa   <br>

                        <a onClick="return confirm('Tem certeza que deseja um email para a empresa?')" href="/emails/enviar_para_estudante/{{$estagio->id}}">
                        <i class="fas fa-envelope-open-text"></i> </a>
                        Enviar E-mail contendo o Termo de Ciência para o estudante 


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

            @foreach($estagio->aditivos->where('aprovado_graduacao','=',0)->where('comentario_graduacao','=',null) as $aditivo)


            <div class="row">
                <div class="col-12 form-group">
                <br><hr><br>
                    <form method="POST" action="/analise_alteracao/{{$aditivo->id}}">
                        @csrf
                        <b>Aditivo de Alteração Pendente:</b> {{ $aditivo->alteracao }}<br><br>

                        @if(($aditivo->comentario_graduacao)!=null)
                            <b>Avaliação do parecerista sobre o aditivo:</b> {{ $aditivo->comentario_graduacao }}<br><br>

                            <b>Comentário do parecerista sobre o aditivo:</b> {{ $aditivo->comentario_graduacao }}<br><br>
                        @endif

                        

                        <label for="comentario_graduacao">Em caso de indeferimento ou solicitação de análise 
                        por parte do parecerista, especifique o motivo: </label><br>
                        <textarea name="comentario_graduacao" rows="5" cols="60"></textarea><br>
                        
                        <button type="submit" class="btn btn-success" name="analise_alteracao_action" value="deferir_alteracao"
                            onClick="return confirm('Tem certeza que deseja deferir o aditivo?')" >
                            Deferir Aditivo
                        </button>

                        <button type="submit" class="btn btn-warning" name="analise_alteracao_action" value="indeferir_alteracao"
                            onClick="return confirm('Tem certeza que deseja indeferir o aditivo?')" >
                            Indeferir Aditivo
                        </button>

                        <button type="submit" class="btn btn-info" name="analise_alteracao_action" value="solicitar_parecerista"
                            onClick="return confirm('Tem certeza que deseja solicitar avaliação do parecerista?')" >
                            Solicitar Avaliação do Parecerista
                        </button>
                        
                    </form>
                </div>
            </div>

            @endforeach

            @foreach($estagio->aditivos
            ->where('aprovado_graduacao','===',null)
            ->where('comentario_graduacao','!=',null)
            ->where('comentario_parecerista','!=',null) as $aditivo)

            <div class="row">
                <div class="col-12 form-group">
                    <form method="POST" action="/analise_alteracao/{{$aditivo->id}}">
                        @csrf
                        <br>
                        <b>Aditivo de Alteração Pendente:</b> {{ $aditivo->alteracao }}<br><br>

                        <b>Avaliação do parecerista sobre o aditivo:</b> 
                        @if(($aditivo->aprovado_parecerista)==0)
                        Aditivo Reprovado
                        @elseif(($aditivo->aprovado_parecerista)==1)
                        Aditivo Aprovado
                        @endif

                        <br><br>

                        <b>Comentário do parecerista sobre o aditivo:</b> {{ $aditivo->comentario_parecerista }}<br><br>
                        
                        <button type="submit" class="btn btn-success" name="analise_alteracao_action" value="deferir_alteracao_posparecerista"
                            onClick="return confirm('Tem certeza que deseja deferir o aditivo?')" >
                            Deferir Aditivo
                        </button>

                        <button type="submit" class="btn btn-warning" name="analise_alteracao_action" value="indeferir_alteracao_posparecerista"
                            onClick="return confirm('Tem certeza que deseja indeferir o aditivo?')" >
                            Indeferir Aditivo
                        </button>
                        
                    </form>
                </div>
            </div>

            @endforeach

</div>
@endcan('admin')
