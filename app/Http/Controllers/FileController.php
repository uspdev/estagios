<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\File;
use App\Models\Estagio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class FileController extends Controller
{
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
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf',
            'estagio_id' => 'required|integer|exists:estagios,id'
        ]);
        $file = new File;
        $file->estagio_id = $request->estagio_id;
        $file->original_name = $request->file('file')->getClientOriginalName();
        $file->path = $request->file('file')->store('.');
        $file->user_id = Auth::user()->id;
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
        return Storage::download($file->path, $file->original_name);
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
