<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = Curso::all();
        return view('curso.curso_listar',[
            'result' => $result,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //$row = Profesor::find($id);
        $row = Curso::whereId($id)->first();
        return view('curso.curso_formulario',[
            'row'   => $row,
            'mode'  => 'edit',
            'url'   => route('cursos.update',$row->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Curso::whereId($id)->first();
        $row->fill($request->all());
        $row->save();
        return redirect()->route('cursos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
