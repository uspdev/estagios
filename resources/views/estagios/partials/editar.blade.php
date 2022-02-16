@section('javascripts_bottom')
  <script src="{{asset('/js/estagios.js')}}"></script>
@endsection('javascripts_bottom')

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{asset('/css/estagios.css')}}">
@endsection('styles')

<br>
<h4>Editar Estágio</h4>

<div class="card">
  <div class="card-header">Informações sobre o estágio ( <b>{{ $estagio->nome
      }}</b> )</div>
    <div class="card-body">
        <div class="form-group">
            <label for="nomcur">Curso de Graduação: </label>
            <select name="nomcur" class="form-control" id="nomcur">
                        <option value="" selected="">- Selecione -</option>
                            @foreach ($estagio->nomcurOptions() as $option)
                            @if (old('nomcur') == '' and isset($estagio->nomcur) )
                        <option value="{{$option}}" {{ ( $estagio->nomcur == $option) ? 'selected' : ''}}>
                            {{$option}}
                        </option>
                        @else
                        <option value="{{$option}}" {{ ( old('nomcur') == $option) ? 'selected' : ''}}>
                            {{$option}}
                        </option>
                        @endif
                        @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-info">
                Salvar alterações
            </button>
        </div>

    </div>
</div>

<hr>
