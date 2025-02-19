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
            $q = session("session_cursos_q_search");
        }
        $result = Curso::orWhere('descripcion','LIKE',$q)
                            ->orWhere('horario','LIKE',$q)
                            // ->orWhere(DB::raw("CONCAT('apellidos','nombres')"),'LIKE',$q)
                            ->paginate(30)
                            ->withQueryString();
        session([
            "session_cursos_q_search" => $request->q,
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
        return view('notas.nota_formulario');
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
        //
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
