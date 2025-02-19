<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfesorController extends Controller
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
            $q = session("session_profesores_q_search");
        }
        $result = Profesor::orWhere('telefono','LIKE',$q)
                            ->orWhere('email','LIKE',$q)
                            ->orWhere(DB::raw("CONCAT('apellidos','nombres')"),'LIKE',$q)
                            ->paginate(15)
                            ->withQueryString();
        session([
            "session_profesores_q_search" => $request->q,
        ]);
        return view('profesor.profesor_listar',[
            'result' => $result,
            'q' => ($request->has('q')) ? $request->q : '',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
        $row = Profesor::whereId($id)->first();
        if($row){
            $row->delete();
            $data['status'] = 100;
            $data['message'] = 'Registro eliminado!';
        }else{
            $data['status'] = 101;
            $data['message'] = 'El registro no existe o ya fue eliminado!';
        }
        return response()->json($data, $data['status'] == 100 ? 200 : 403);
    }
}
