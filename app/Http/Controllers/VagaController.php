<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VagaRequest;
use App\Models\Vaga;
use Auth;
use Illuminate\Support\Facades\Gate;

class VagaController extends Controller
{
    public function index(Request $request){
        $this->authorize('logado');
        if ( Gate::allows('admin') ) {
            $vagas = Vaga::where('status','Em análise')
                ->orWhere('status','Reprovada')
                ->orderBy('status', 'desc')->paginate(10);
        } else {
            $vagas = Vaga::where('user_id',auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);
        }
        return view('vagas.index')->with([
            'vagas' => $vagas,
        ]);
    }

    public function show(Vaga $vaga){
        return view('vagas.show')->with('vaga', $vaga);
    }

    public function create(){
        $this->authorize('logado');
        return view('vagas.create')->with('vaga',new Vaga);
    }

    public function store(VagaRequest $request){
        $this->authorize('logado');
        $validated = $request->validated();
        $validated['user_id'] = auth()->user()->id;
        $validated['status'] = 'Em análise';
        $vaga = Vaga::create($validated);
        return redirect ("vagas/{$vaga->id}");
    }

    public function edit(Vaga $vaga) {
        $this->authorize('owner',$vaga);
        return view('/vagas.edit')-> with('vaga', $vaga);
    }

    public function update(VagaRequest $request, Vaga $vaga){
        $this->authorize('owner',$vaga);
        $validated = $request->validated();
        # quando houver edição, volta para análise
        $validated['status'] = 'Em análise';
        $vaga->update($validated);
        return redirect("/vagas/{$vaga->id}");
    }

    public function destroy(Vaga $vaga){
        # PRECISAMOS ARRUMAR
        if ( Gate::allows('empresa',$vaga->cnpj) | Gate::allows('admin') ) {
            $vaga->delete();
            return redirect('/');
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
    }

    public function status(Request $request, Vaga $vaga){
        $this->authorize('admin');
        $vaga->status = $request->status;
        $vaga->justificativa = $request->justificativa ?? '';
        $vaga->save();
        return redirect()->route('vagas.show', [$vaga]);
    }
}
