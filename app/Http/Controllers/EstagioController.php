<?php
namespace App\Http\Controllers;

use App\Models\Estagio;
use App\Models\File;
use App\Models\Aditivo;
use App\Models\User;
use Auth;
use Uspdev\Replicado\Graduacao;
use Uspdev\Replicado\Pessoa;
use App\Http\Requests\EstagioRequest;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Gate;
use App\Utils\ReplicadoUtils;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Utils\AuditUtils;
use App\Models\Area;
use App\Service\GeneralSettings;

class EstagioController extends Controller
{
    private $settings;

    public function __construct() {
        $this->settings = app(GeneralSettings::class);
    }

    public function index(Request $request,Estagio $estagio){

        if (Gate::allows('admin')) {

            if ($request->buscastatus != null && $request->busca != null){

                $estagios = Estagio::where('numero_usp','LIKE',"%{$request->busca}%")
                ->orWhere('nome','LIKE',"%{$request->busca}%")
                ->where('status', $request->buscastatus)->orderBy('nome')->paginate(10);

            } else if(isset($request->busca)) {
                $estagios = Estagio::where('numero_usp','LIKE',"%{$request->busca}%")
                ->orWhere('nome','LIKE',"%{$request->busca}%")->orderBy('nome')->paginate(10);
                }

                else if(isset($request->buscastatus)){
                if ($request->buscastatus != null){
                    $estagios = Estagio::where('status', $request->buscastatus)->orderBy('nome')->paginate(10);
                }

            } else {

            $estagios = Estagio::orderBy('nome')->paginate(10);

            }

        } else if (Gate::allows('empresa')){
            $cnpj = Auth::user()->cnpj;
            $estagios = Estagio::where('cnpj',$cnpj)->orderBy('nome')->paginate(10);

        } else {
            $request->session()->flash('alert-danger','Usuário sem permissão');
            return redirect('/');
        }

        if ($request->buscastatus == 'rescisao') {
                $statusavaliado = true;
                return view('estagios.index')->with([
                    'estagios' => $estagios,
                    'estagio' => new Estagio(),
                    'statusavaliado' => $statusavaliado,
                ]);

        } else {

            return view('estagios.index')->with([
                'estagios' => $estagios,
                'estagio' => new Estagio(),
            ]);

        }

    }

    public function show(Estagio $estagio)
    {
        $this->authorize('logado');
        $areas = Area::where('estagios_id',$estagio->id)->get()->pluck('area')->toArray();

        return view('estagios.show')->with([
            'estagio' => $estagio,
            'areas'   => $areas,
            'settings' => $this->settings
        ]);
    }

    public function create(){
        $this->authorize('empresa');
        return view('estagios.create')->with([
            'estagio' => new Estagio,
            'settings' => $this->settings
        ]);
    }

    public function store(EstagioRequest $request)
    {
        $this->authorize('empresa');
        $validated = $request->validated();
        $validated['status'] = 'em_elaboracao';
        $estagio = Estagio::create($validated);
        $curso = Graduacao::curso($estagio->numero_usp, 8);
        if($curso) {
            $estagio->nomcur =  $curso['nomcur'];
            $estagio->nomhab =  $curso['nomhab'];
        }
        $estagio->save();
        return redirect("estagios/{$estagio->id}");
    }

    public function destroy(Estagio $estagio, Aditivo $aditivo, File $file){
        if (Gate::allows('admin') | Gate::allows('empresa',$estagio->cnpj)) {

            if($estagio->status == 'concluido'){
                return back()->with('alert-danger', 'Não é possível deletar um estágio concluído.');
            }

            $aditivos = Aditivo::where('estagio_id','=',$estagio->id)->get();
            foreach ($aditivos as $aditivo) {
                $aditivo->delete();
            }

            $arquivos = File::where('estagio_id','=',$estagio->id)->get();
            foreach ($arquivos as $arquivo) {
                Storage::delete($arquivo->path);
                $arquivo->delete();
            }

            $estagio->delete();
            return redirect('/estagios');
        }
        abort(403, 'Access denied');
    }

    public function alterarParecerista(Request $request, Estagio $estagio){
        if (Gate::allows('admin')) {
        $estagio->numparecerista = $request->numparecerista;
        $estagio->save();

    } else {
        request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
    }
        return redirect("/estagios/{$estagio->id}");
    }

    /* Api para entregar dados do(a) aluno(a) no blade */
    public function info(Request $request)
    {
        $this->authorize('empresa');
        if(empty($request->codpes)){
            return response('Pessoa não encontrada');
        }

        if(!is_int((int)$request->codpes)){
            return response('Pessoa não encontrada');
        }

        if(strlen($request->codpes) < 6){
            return response('Pessoa não encontrada');
        }

        $info = Pessoa::nomeCompleto($request->codpes);
        if($info) {
            $info .= ' - Período do curso: ' . ReplicadoUtils::periodo($request->codpes);
            return response($info);
        } else {
            return response('Pessoa não encontrada');
        }
    }

    public function editar(Estagio $estagio)
    {
        $areas = Area::where('estagios_id',$estagio->id)->get()->pluck('area')->toArray();

        if (Gate::allows('admin')) {
            return view('estagios.edit')->with([
                'estagio' => $estagio,
                'areas'   => $areas,
            ]);
        }
        abort(403, 'Access denied');
    }

}
