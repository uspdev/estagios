@extends('pdfs.header')

@section('content')

<div style="border: 1px solid #000; text-align: center;">
    <br><b>EMPRESAS CADASTRADAS</b><br><br>
</div>

<div style="border-width: 1px; border-style: solid; border-color: #000; text-align: justify; padding: 0px;">
    <table border="1" cellspacing="0">
        <tr>
            <td><b> Empresa: </b> </td>
            <td><b> CNPJ: </b></td>
        </tr>
    @foreach ($empresa as $empresa)
        <tr>
            <td> {{ $empresa->nome }}</td>
            <td> {{ $empresa->cnpj }}</td><br>
        </tr>
    @endforeach
    </table>


<br><br>
<div style="text-align: right">São Paulo, {{ Carbon\Carbon::now()->setLocale('de') }}</div>

<br><br>

@endsection('content')

@section('footer')
<div style="text-align: initial; font-weight: bold; ">
Serviço de Estágios - {{ $settings->unidade }}.
</div>
@endsection