@extends('main') 

@section('content')

<div class="card">

<div class="card-body">
<h3> Meu estágio </h3>
@if(isset($estagios))
<table class="table table-striped">
<thead>
    <tr>
        <th>Número USP:</th>
        <th>Nome:</th>
        <th>E-mail:</th>
        <th>Curso:</th>
        <th>Carga horária:</th>
        <th>Empresa:</th>
    </tr>
</thead>
@forelse($estagios as $estagio)
<tbody>
    <tr>
        <td> <a href ="/estagios/{{$estagio->id}}"> {{ $estagio->numero_usp}} </a> </td>
        <td> {{ $estagio->nome }} </td>
        <td> {{ $estagio->email }} </td>
        <td> {{ $estagio->nomhab }} </td>
        <td> {{ $estagio->cargahoras }}:{{ $estagio->cargaminutos }}h</td>
        <td> {{ $estagio->empresa->nome }} </td>
    </tr>
    @empty
        <td colspan="6">Você não possui estágios</td>
@endforelse
</tbody>
</table>
@endif
<div>
<div>

@endsection('content')