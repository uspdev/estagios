<?php

namespace App\Http\Controllers;

use Auth;
use Response;
use App\Models\File;
use App\Models\Estagio;
use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class FileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FileRequest $request)
    {
        $validated = $request->validated();
        $file = new File;
        $file->estagio_id = $request->estagio_id;
        $file->original_name = $request->original_name;
        $file->path = $request->file('file')->store('.');
        $file->user_id = Auth::user()->id;
        $file->save();
        return back()->with('success', 'Arquivo enviado com sucesso'); ;;

    }

    public function store_relatorio(FileRequest $request)
    {
        $validated = $request->validated();
        $file = new File;
        $file->estagio_id = $request->estagio_id;
        $file->original_name = $request->original_name;
        $file->path = $request->file('file')->store('.');
        $file->user_id = Auth::user()->id;
        $file->tipo_documento = 'Relatorio';
        $file->save();
        return back()->with('success', 'Arquivo enviado com sucesso'); ;;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        $filename = $file->original_name;
        $path = Storage::disk('local')->path($file->path);
        $pdf = Response::make(file_get_contents($path), 200);
        $pdf->header('Content-Type', 'application/pdf', 'filename="'.$filename.'"');
        return $pdf;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file, Estagio $estagio)
    {
        if (Gate::allows('admin')) {
            $file->delete();
            return back()->with('success', 'Arquivo Deletado'); ;
        }
        abort(403, 'Access denied');
    } 
    
}
