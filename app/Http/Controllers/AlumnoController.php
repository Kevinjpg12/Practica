<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = Alumno::all();
        return view('alumno.alumno_listar',[
            'result' => $result,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $row = new Alumno();
        #$row->fill($request->all());
        #$row->save();
        return view('alumno.alumno_formulario',[
            'row'   => $row,
            'mode'  => 'new',
            'url'   => route('alumnos.store'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $row = new Alumno();
        $row->fill($request->all());
        $row->save();
        return redirect()->route('alumnos.index');
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
        $row = Alumno::whereId($id)->first();
        return view('alumno.alumno_formulario',[
            'row'   => $row,
            'mode'  => 'edit',
            'url'   => route('alumnos.update',$row->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Alumno::whereId($id)->first();
        $row->fill($request->all());
        $row->save();
        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Alumno::whereId($id)->first();
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

    public function ajax_alumno(Request $request){
        $s = $request->s;
        $q = str_replace(' ','%',"{$request->q}").'%';
        $result = Alumno::select(
                                'id as id',
                                'nombre as text'
                            )                            
                            ->orWhere(DB::raw("CONCAT('apellido','nombre')"),'LIKE',$q)
                            ->orderBy('apellidos')
                            ->limit(env('RESULT_SELECT2',20))
                            ->get();
        return response()->json(['results' => $result]);
    }
}
