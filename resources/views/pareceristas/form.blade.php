@section('javascripts_head')
  <script src="{{asset('/js/pareceristas.js')}}"></script>
@endsection('javascript_head')

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{asset('/css/pareceristas.css')}}">
@endsection('styles')

<div class="card">
  <div class="card-header">Informações</div>
  <div class="card-body">

    <div class="row">
      <div class="col-sm form-group"> 
        <label for="numero_usp" class="required">Número USP: </label>
        <input type="text" class="form-control" id="numero_usp" name="numero_usp" value="{{old('numero_usp',$parecerista->numero_usp)}}">
      </div>
    </div>

    <div class="row">
      <div class="col-sm form-group">
        <label for="presidente">É o/a Presidente da Comissão de Graduação?</label>
        <input type="hidden" name="presidente" value="0">
        <input type="checkbox" id="presidente" name="presidente" value="1" @if($parecerista->presidente) checked @endif>
      </div>
    </div>

    <div class="row">
      <div class="col-sm form-group">
        <button type="submit" class="btn btn-success">Enviar</button>
      </div>
    </div>
  </div>
</div>
