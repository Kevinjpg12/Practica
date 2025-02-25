<?php

namespace App\Http\Controllers;

use App\Models\Asignacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignacionController extends Controller
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
            $q = session("session_asignacion_q_search");
        }
        $result = Asignacion::orWhere('alumno_id','LIKE',$q)
                            //->orWhere('profesor_id','LIKE',$q)
                            // ->orWhere(DB::raw("CONCAT('apellidos','nombres')"),'LIKE',$q)
                            ->paginate(30)
                            ->withQueryString();
        session([
            "session_asignacion_q_search" => $request->q,
        ]);
        // $result = Asignacion::paginate(15);
        return view('asignacion.asignacion_listar',[
            'result'    => $result,
            'q' => ($request->has('q')) ? $request->q : '',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $row = new Asignacion();
        return view('asignacion.asignacion_formulacion',[
            'row'   => $row,
            'mode'  => 'new',
            'url'   => route('asignacion.store'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $row = new Asignacion();
        $row->fill($request->all());
        $row->save();
        return redirect()->route('asignacion.index');
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
        $row = Asignacion::whereId($id)->first();
        return view('asignacion.asignacion_formulacion',[
            'row'   => $row,
            'mode'  => 'edit',
            'url'   => route('asignacion.update',$row->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'alumno_id'    => 'required|min:2',
            'curso_id' => 'required',
        ]);
        $row = Asignacion::whereId($id)->first();
        $row->fill($request->all());
        $row->save();
        return redirect()->route('asignacion.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Asignacion::whereId($id)->first();
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
