<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use App\Models\Empresa;
use App\Models\Estagio;
use App\Models\Convenio;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Utils\LoginEmpresa;

class EmpresaController extends Controller
{
    public function index(Request $request){
        $this->authorize('admin');
        if(isset($request->busca)) {
            $empresas = Empresa::where('nome','LIKE',"%{$request->busca}%")
                                ->orWhere('cnpj','LIKE',"%{$request->busca}%")
                ->paginate(10);
        } else {
            $empresas = Empresa::paginate(10);
        }        
        return view('empresas.index', compact('empresas'));
    }

    public function show(Request $request, Empresa $empresa){

        if (Gate::allows('empresa', $empresa->cnpj) | Gate::allows('admin')) {
            $estagios = Estagio::where('cnpj',$empresa->cnpj)->paginate(10);
            $convenios = Convenio::where('cnpj',$empresa->cnpj)->paginate(10);
            return view('empresas.show')->with([
                'empresa'  => $empresa,
                'estagios' => $estagios,
                'convenios' => $convenios,
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
        if (Gate::allows('empresa') | Gate::allows('admin')) {
            $validated = $request->validated();

            /* Vamos validar na mão depois passaremos para o request */
            // Verificar se o email não está cadastrado para outra empresa
            $outra_empresa = Empresa::where('email',$validated['email'])->first();
            if($outra_empresa){
                $request->session()->flash('alert-danger',"Email {$validated['email']} cadastrado para outra empresa, escolha outro");
                $validated['email'] = $validated['email'] . '.invalido';
                $empresa = Empresa::create($validated);
                return redirect("/empresas/$empresa->id/edit");
            }

            $empresa = Empresa::create($validated);
            return redirect("/empresas/$empresa->id");
        } else {
            $request->session()->flash('alert-danger','Usuário sem permissão');
            return redirect('/');
        }
    }

    public function edit(Empresa $empresa){

        if (Gate::allows('empresa', $empresa->cnpj) | Gate::allows('admin')) {
            return view('empresas.edit')->with('empresa', $empresa);
        } else {
            request()->session()->flash('alert-danger','Usuário sem permissão');
            return redirect('/');
        }
    }

    public function update(EmpresaRequest $request, Empresa $empresa){
        
        if (Gate::allows('empresa', $empresa->cnpj) | Gate::allows('admin')) {
            $validated = $request->validated();

            /* Vamos validar na mão depois passaremos para o request */
            // Verificar se o email não está cadastrado para outra empresa
            $outra_empresa = Empresa::where('email',$validated['email'])->first();
            if($outra_empresa){
                if($outra_empresa->id != $empresa->id){
                    $request->session()->flash('alert-danger',"Email {$validated['email']} cadastrado para outra empresa, escolha outro");
                    $validated['email'] = $empresa->email;
                    $empresa->update($validated);
                    return redirect("/empresas/$empresa->id/edit");
                }
            }
            
            $empresa->update($validated);
            return redirect("/empresas/$empresa->id");
        } else {
            $request->session()->flash('alert-danger','Usuário sem permissão');
            return redirect('/');
        }
    }

    public function destroy(Request $request, Empresa $empresa){
        $this->authorize('admin');
        /* Não vamos permitir deletar empresa, quebra o sistema */
        //$empresa->delete();
        return redirect('/empresas');
    }

    /* Métodos além do CRUD */
    public function empresa_update(Request $request){
        $this->authorize('empresa');
        
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

            $user = LoginEmpresa::login($empresa->cnpj,$empresa->email);

            request()->session()->flash("alert-info","Login alterado! Agora você está logado(a) como {$user->name} e {$user->email}");

        } else {
            request()->session()->flash('alert-danger','Usuário sem permissão');
        }
        return redirect('/');
    }

    public function acessar_outra_empresa(){
        $this->authorize('empresa',Auth::user()->cnpj);
        $empresas = Empresa::where('conceder_acesso_cnpj',Auth::user()->cnpj)->get();
        return view('empresas.index', compact('empresas'));
    }
}
