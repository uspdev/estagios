
@can('parecerista')

<div class="card">
<div class="card-header"><b>Justificativa da análise acadêmica</b></div>
<div class="card-body">


<form method="POST" action="/analise_academica/{{$estagio->id}}">
    @csrf

    <label for="mediaponderada">Média ponderada com reprovações: </label>
        <input type="text" class="form-control" id="mediaponderada" name="mediaponderada" value="{{old('mediaponderada',$estagio->mediaponderada)}}">

    <br> 

    <label for="horariocompativel">O Horário é compatível com os horários disponíveis na grade horária do aluno?: </label>
        <input type="text" class="form-control" id="horariocompativel" name="horariocompativel" value="{{old('horariocompativel',$estagio->horariocompativel)}}">

    <br> 

    <label for="desempenhoacademico">Avalie o desempenho acadêmico do aluno: </label><br>
        <textarea name="desempenhoacademico" rows="5" cols="60">{{old('desempenhoacademico',$estagio->desempenhoacademico)}}</textarea>   

    <br> 

    <label for="atividadespertinentes">As atividades propostas no plano de estágio são pertinentes ao curso do aluno?: </label>               
    <select name="atividadespertinentes" class="form-control" id="atividadespertinentes">
        <option value="" selected="">- Selecione -</option>
                @foreach ($estagio->atividadespertinentesOptions() as $option)
                @if (old('atividadespertinentes') == '' and isset($estagio->atividadespertinentes) )
        <option value="{{$option}}" {{ ( $estagio->atividadespertinentes == $option) ? 'selected' : ''}}>
                {{$option}}
        </option>
                @else
        <option value="{{$option}}" {{ ( old('atividadespertinentes') == $option) ? 'selected' : ''}}>
                {{$option}}
        </option>
            @endif
            @endforeach
    </select>

    <br>

    <label for="atividadesjustificativa">Justifique a pertinencia das atividades: </label><br>
        <textarea name="atividadesjustificativa" rows="5" cols="60" value="{{old('atividadesjustificativa',$estagio->atividadesjustificativa)}}"></textarea>  

    <br>     

    <label for="analise_academica">Parecer final: </label> <br>
        <textarea name="analise_academica" rows="5" cols="60" value="{{old('analise_academica',$estagio->analise_academica)}}"></textarea>    

    <div class="form-group">
        <button type="submit" class="btn btn-info" name="analise_academica_action" value="indeferimento_analise_academica">Indeferir</button>
       <!-- <button type="submit" class="btn btn-success" name="analise_academica_action" value="deferimento_analise_academica">Deferir Parcialmente</button> -->
        <button type="submit" class="btn btn-success" name="analise_academica_action" value="deferimento_analise_academica">Deferir</button>
    </div>

</form>

@if($estagio->analise_academica)
    <b>último parecer de mérito:</b> {{$estagio->analise_academica}}<br>
    Parecer de mérito realizado por: {{ $estagio->analise_academica_user->name }} <br>
@endif

</div>
</div>

@endcan('parecerista')
