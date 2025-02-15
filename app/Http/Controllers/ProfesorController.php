<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = Profesor::all();
        return view('profesor.profesor_listar',[
            'result' => $result,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $row = new Profesor();
        #$row->fill($request->all());
        #$row->save();
        return view('profesor.profesor_formulario',[
            'row'   => $row,
            'mode'  => 'new',
            'url'   => route('profesores.store'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $row = new profesor;
        $row->fill($request->all());
        $row->save();
        return redirect()->route('profesores.index');
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
        $row = Profesor::whereId($id)->first();
        return view('profesor.profesor_formulario',[
            'row'   => $row,
            'mode'  => 'edit',
            'url'   => route('profesores.update',$row->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Profesor::whereId($id)->first();
        $row->fill($request->all());
        $row->save();
        return redirect()->route('profesores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
