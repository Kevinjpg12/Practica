<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotaController extends Controller
{ 
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('q')){
            $q = $request->q;
            $q = str_replace('(','',$q);
            $q = str_replace("'",'',$q);
            $q = str_replace("@",' ',$q);
            $q = '%'.str_replace(' ','%',$q).'%';
        }else{
            $q = session("session_notas_q_search");
        }
        $result = Nota::orWhere('alumno_id','LIKE',$q)
                            ->orWhere('curso_id','LIKE',$q)
                            // ->orWhere(DB::raw("CONCAT('apellidos','nombres')"),'LIKE',$q)
                            ->paginate(30)
                            ->withQueryString();
        session([
            "session_notas_q_search" => $request->q,
        ]);
        return view('notas.nota_listar',[
            'result' => $result,
            'q' => ($request->has('q')) ? $request->q : '',
        ]);
    } 
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        $row = new Nota();
        #$row->fill($request->all());
        #$row->save();
        return view('notas.nota_formulario',[
            'row'   => $row,
            'mode'  => 'new',
            'url'   => route('notas.store'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nombre'    => 'required',
        //     'apellidos' => 'required',
        // ]);
        $row = new Nota();
        $row->fill($request->all());
        $row->save();
        return redirect()->route('notas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return view('notas.nota_formulario');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
