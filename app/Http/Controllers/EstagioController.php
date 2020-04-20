<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class EstagioController extends Controller
{
    public function create(){
        return view('estagios.create');
    }

    public function store(Request $request)
    {
        echo 'Valor da Bolsa: ', $request->valorbolsa . "<br>";
        echo 'Tipo de Pagamento: ', $request->especifique . "<br>";
        echo 'Justificativa: ', $request->justificativa . "<br><hr>";
        echo 'Data de Início: ',$request->diaini,"/",$request->mesini,"/",$request->anoini,"<br>";
        echo 'Data de Térimino: ',$request->diafin,"/",$request->mesfin,"/",$request->anofin,"<br><hr>";
        echo 'Carga Horária: ', $request->cargahoras . " horas e ", $request->cargaminutos . " minutos<br>" ;
        echo 'Horário do Estágio: ', $request->horario . "<br><hr>";
        echo 'Valor do Auxílio Transporte: ', $request->auxtrans . "<br>";
        echo 'Tipo de Auxílio: ', $request->especifiquevt . "<br><hr>";        
        echo 'Especificações da Atividade: ', $request->atividades . "<br><hr>";
        echo 'Seguradora: ', $request->seguradora . "<br>";
        echo 'Número da Apólice: ', $request->numseguro . "<br><hr>";
        dd("Parece que deu certo");
    }
}