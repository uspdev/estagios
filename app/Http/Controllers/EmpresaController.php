<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use App\Empresa;
use App\Estagio;
use App\Convenio;
use Auth;
use App\User;
use Illuminate\Support\Facades\Gate;

class EmpresaController extends Controller
{
    public function index(Request $request){
        $this->authorize('admin');
        if(isset($request->busca)) {
            $empresas = Empresa::where('nome','LIKE',"%{$request->busca}%")
                                ->orWhere('cnpj','LIKE',"%{$request->busca}%")
                ->paginate(20);
        } else {
            $empresas = Empresa::paginate(20);
        }        
        return view('empresas.index', compact('empresas'));
    }

    public function show(Request $request, Empresa $empresa){

        if (Gate::allows('empresa', $empresa->cnpj) | Gate::allows('admin')) {
            $estagios = Estagio::where('cnpj',$empresa->cnpj)->get();
            $convenios = Convenio::where('cnpj',$empresa->cnpj)->get();
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
            $request->session()->flash('alert-danger','Usuário sem permissão');
            return redirect('/');
        }
    }

    public function update(EmpresaRequest $request, Empresa $empresa){
        if (Gate::allows('empresa', $empresa->cnpj) | Gate::allows('admin')) {
            $validated = $request->validated();
            
            $empresa->update($validated);
            return redirect("/empresas/$empresa->id");
        } else {
            $request->session()->flash('alert-danger','Usuário sem permissão');
            return redirect('/');
        }
    }

    public function destroy(Request $request, Empresa $empresa){
        $this->authorize('admin');
        $empresa->delete();
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

    public function adminLogandoComoEmpresa($cnpj){
        $this->authorize('admin');

        $cnpj = preg_replace("/[^0-9]/", "", $cnpj);
        $empresa = Empresa::where('cnpj',$cnpj)->first();

        $user = User::where('cnpj',$cnpj)->first();
        if (is_null($user)) $user = new User;
        $user->cnpj  = $empresa->cnpj;
        $user->name  = $empresa->cnpj;
        $user->email = $empresa->email;
        $user->save();
        Auth::login($user, true);
        return redirect('/');
    }
}
