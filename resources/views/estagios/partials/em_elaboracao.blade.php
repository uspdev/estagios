
<div>
    
    @if(!empty($estagio->analise_tecnica))
        <b>Última análise técnica do setor de graduação:</b> {{$estagio->analise_tecnica}}
        <br>
    @endif

    <div style="text-align: center;"><b style="color:red">Aviso Importante:</b> O termo deve ser entregue assinado para a instituição no mínimo 10 dias úteis antes do início do período do estágio no email <b>estagiosfflch@usp.br</b></div>
    <br>

    @can('empresa',$estagio->cnpj)

        @if(is_null($estagio->renovacao_parent_id))
            
                <form method="POST" action="/enviar_para_analise_tecnica/{{$estagio->id}}">
                @csrf

                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="enviar_para_analise_tecnica" value="enviar_para_analise_tecnica"
                        onClick="return confirm('Tem certeza que quer enviar para o Setor de Graduação?')">
                            Salvar e enviar para Análise Técnica do <b>Setor de Graduação
                    </button>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info" name="enviar_para_analise_tecnica" value="apenas_salvar">
                        Apenas salvar alterações
                    </button>
                </div>
                
                @include ('estagios.form')
                </form>

        @else

                <form method="POST" action="/enviar_para_analise_tecnica/{{$estagio->id}}">
                @csrf

                <div class="form-group">

                <div class="form-group">
                    <label for="alteracoesadcionais">Caso tenha sido feita alguma outra alteração adicional para além das novas datas
                    de contrato, favor descrever: (deixar em branco caso nenhuma alteração adicional tenha sido feita)</label>
                    <textarea name="alteracoesadcionais" rows="4">{{old('alteracoesadcionais',$estagio->alteracoesadcionais)}}</textarea>
                </div>

                    <button type="submit" class="btn btn-success" name="enviar_para_analise_tecnica" value="enviar_para_analise_tecnica_renovacao"
                        onClick="return confirm('Tem certeza que quer enviar para o Setor de Graduação?')">
                            Salvar e enviar para Análise Técnica do <b>Setor de Graduação
                    </button>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info" name="enviar_para_analise_tecnica" value="apenas_salvar_renovacao">
                        Apenas salvar alterações
                    </button>
                </div>

                @include ('estagios.form')
                </form>

        @endif

    @endcan
    

</div>   

