<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PareceristaRequest;
use App\Models\Parecerista;
use App\Models\Estagio;
use App\Models\User;
use Auth;
use Uspdev\Replicado\Pessoa;

class PareceristaController extends Controller
{
    public function index(Request $request){
        $this->authorize('admin');

        if(isset($request->busca)){
            $pareceristas = Parecerista::where('numero_usp','LIKE',"%{$request->busca}%")->paginate(5);
        } else {
            $pareceristas = Parecerista::paginate(30);
        }

        return view('pareceristas.index')->with('pareceristas',$pareceristas);
    }

    public function show(Parecerista $parecerista){
        $this->authorize('admin');
        return view('pareceristas.show')->with('parecerista',$parecerista);
    }

    public function create(){
        $this->authorize('admin');
        return view('pareceristas.create')->with('parecerista',new Parecerista);
    }

    public function store(PareceristaRequest $request){
        $this->authorize('admin');
        $validated = $request->validated();
        if($validated['presidente'] == 1) {
            $pareceristas = Parecerista::all();
            foreach($pareceristas as $parecerista){
                $parecerista->presidente = 0;
                $parecerista->save();
            }
        }
        Parecerista::create($validated);
        return redirect('/pareceristas/');
    }

    public function edit(Parecerista $parecerista) {
        $this->authorize('admin');
        return view('pareceristas.edit')->with('parecerista',$parecerista);
    }

    public function update(PareceristaRequest $request, Parecerista $parecerista){
        $this->authorize('admin');
        $validated = $request->validated();
        if($validated['presidente'] == 1) {
            $pareceristas = Parecerista::all();
            foreach($pareceristas as $parecerista){
                $parecerista->presidente = 0;
                $parecerista->save();
            }
        }
        $parecerista->update($validated);
        return redirect("pareceristas/$parecerista->id");
    }

    public function destroy( Parecerista $parecerista){

        $this->authorize('admin');
        $parecerista->delete();
        return redirect('/pareceristas');
    }

    public function adminLogandoComoParecerista($codpes){
        $this->authorize('admin');

        $user = User::where('codpes',$codpes)->first();

        if (is_null($user)) $user = new User;
        $user->codpes  = $codpes;
        $user->name  = Pessoa::nomeCompleto($codpes);
        $user->email = Pessoa::email($codpes);
        $user->save();
        Auth::login($user, true);
        return redirect('/');
    }

    public function meusPareceres(){
        $this->authorize('parecerista');

        $estagios = Estagio::where('status',"!=", "em_analise_academica")
                      ->where('numparecerista',Auth::user()->codpes)->get();

        return view('pareceristas.estagios')->with([
            'estagios' => $estagios,
        ]);
    }

    public function parecerMerito(){
        $this->authorize('parecerista');

        $estagios = Estagio::where('status', "em_analise_academica")
                      ->where('numparecerista',Auth::user()->codpes)->get();

        return view('pareceristas.estagios')->with([
            'estagios' => $estagios,
        ]);
    }

    public function estagiosRescindidos(){
        $this->authorize('parecerista');

        $estagios = Estagio::where('status', "rescisao")
                      ->where('numparecerista',Auth::user()->codpes)->get();

        return view('pareceristas.estagios')->with([
            'estagios' => $estagios,
        ]);
    }
}

