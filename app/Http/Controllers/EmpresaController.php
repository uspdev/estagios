<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use App\Models\Empresa;
use App\Models\Estagio;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Utils\EmpresaUtils;

class EmpresaController extends Controller
{
    public function index(Request $request){
        $this->authorize('admin');
        if(isset($request->busca)) {
            $pontuacoes = ['.','-','/'];
            $cnpj_limpo = str_replace($pontuacoes,'',$request->busca);
            $empresas = Empresa::where('nome','LIKE',"%{$request->busca}%")
                                ->orWhere('cnpj','LIKE',"%{$cnpj_limpo}%")
                ->paginate(10);
        } else {
            $empresas = Empresa::paginate(10);
        }        
        return view('empresas.index', compact('empresas'));
    }

    public function show(Request $request, Empresa $empresa){
        $this->authorize('logado');
        if (Gate::allows('empresa', $empresa->cnpj_number) | Gate::allows('admin')) {
            $estagios = Estagio::where('cnpj',$empresa->cnpj)->paginate(10);
            return view('empresas.show')->with([
                'empresa'  => $empresa,
                'estagios' => $estagios,
            ]);
        } else {
            $request->session()->flash('alert-danger','Usuário sem permissão');
            return redirect('/');
        }
    }
    
    public function create(){
        $this->authorize('admin');
        return view ('empresas.create')->with('empresa', new Empresa);
    }

    public function store(EmpresaRequest $request){
        $this->authorize('logado');
        if (Gate::allows('empresa') | Gate::allows('admin')) {
            $validated = $request->validated();
            $empresa = Empresa::create($validated);
            EmpresaUtils::user($validated);
            return redirect("/empresas/$empresa->id");
        } else {
            $request->session()->flash('alert-danger','Usuário sem permissão');
            return redirect('/');
        }
    }

    public function edit(Empresa $empresa){
        $this->authorize('logado');
        if (Gate::allows('empresa', $empresa->cnpj_number) | Gate::allows('admin')) {
            return view('empresas.edit')->with('empresa', $empresa);
        } else {
            request()->session()->flash('alert-danger','Usuário sem permissão');
            return redirect('/');
        }
    }

    public function update(EmpresaRequest $request, Empresa $empresa){
        $this->authorize('logado');
        if (Gate::allows('empresa', $empresa->cnpj_number) | Gate::allows('admin')) {
            $validated = $request->validated();           
            $empresa->update($validated);
            EmpresaUtils::user($validated);
            return redirect("/empresas/$empresa->id");
        } else {
            $request->session()->flash('alert-danger','Usuário sem permissão');
            return redirect('/');
        }
    }

    public function empresa_update(Request $request){
        $this->authorize('logado');
        $cnpj = Auth::user()->cnpj;
        $this->authorize('empresa', $cnpj);

        $empresa = Empresa::where('cnpj',$cnpj)->first();
        if($empresa)
            return redirect("/empresas/{$empresa->id}/edit");
        else {
            $empresa = new Empresa;
            $empresa->cnpj = Auth::user()->cnpj;
            $empresa->email = Auth::user()->email;
            return view('empresas.create')->with('empresa',$empresa);
        }
    }

    public function logandoComoEmpresa($cnpj){
        $this->authorize('logado');
        if (Gate::allows('empresa') | Gate::allows('admin')) {
            $cnpj = preg_replace("/[^0-9]/", "", $cnpj);
            $empresa = Empresa::where('cnpj',$cnpj)->first();

            if (Gate::allows('empresa')){
                if(!is_null($empresa)){
                    if($empresa->conceder_acesso_cnpj != Auth::user()->cnpj){
                        request()->session()->flash('alert-danger','Usuário sem permissão');
                        return redirect('/');
                    }
                }
            }
            $user = EmpresaUtils::user([
                'cnpj'     => $empresa->cnpj_number,
                'email'    => $empresa->email,
                'password' => $empresa->nome,
                'nome'     => ''
            ]);
            auth()->login($user);
            request()->session()->flash("alert-info", "Logado(a) como {$user->name}");
        } else {
            request()->session()->flash('alert-danger','Usuário sem permissão');
        }
        return redirect('/');
    }

    public function acessar_outra_empresa(){
        $this->authorize('empresa',Auth::user()->cnpj);
        $empresas = Empresa::where('conceder_acesso_cnpj',Auth::user()->cnpj)->paginate(10);
        return view('empresas.index', compact('empresas'));
    }

    public function destroy(Request $request, Empresa $empresa){
        $this->authorize('admin');
        $request->session()->flash('alert-danger','Recurso desativado');
        return redirect('/empresas');
    }

}
