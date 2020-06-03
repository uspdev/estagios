<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EstagioRequest;
use App\Estagio;

class EstagioController extends Controller
{
    public function index(Request $request){

        $this->authorize('admin');

        if(isset($request->busca)) {
            $estagios = Estagio::where('numero_usp','LIKE',"%{$request->busca}%")->paginate(10);
        } else {
            $estagios = Estagio::paginate(10);
        }
        return view('estagios.index')->with('estagios',$estagios);
    }

    public function show(Estagio $estagio)
    {

        $this->authorize('admin');

        return view('estagios.show')->with('estagio',$estagio);
    }    

    public function create(){

        $this->authorize('admin');

        return view('estagios.create')->with('estagio',new Estagio);
    }

    public function store(EstagioRequest $request)
    {

        $this->authorize('admin');

        /* TODO: Cada empresa só pode ter um cadastro */
        $validated = $request->validated();                 
        $estagio = Estagio::create($validated);        
        return redirect("estagios/{$estagio->id}");
    }

    public function edit(Estagio $estagio) {   

        $this->authorize('admin');

        return view ('estagios.edit')->with('estagio',$estagio);
    }

    public function update(EstagioRequest $request, Estagio $estagio)
    {

        $this->authorize('admin');

        $validated = $request->validated();                  
        $estagio->update($validated); 
        return redirect("estagios/{$estagio->id}");
    }

    public function destroy(Estagio $estagio){

        $this->authorize('admin');

        $estagio->delete();
        return redirect('/estagios');
    }
}