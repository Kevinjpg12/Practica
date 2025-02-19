<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\VCursoProfesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
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
        return view('curso.curso_listar',[
            'result' => $result,
            'q' => ($request->has('q')) ? $request->q : '',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $row = new Curso();
        #$row->fill($request->all());
        #$row->save();
        return view('curso.curso_formulario',[
            'row'   => $row,
            'mode'  => 'new',
            'url'   => route('cursos.store'),
        ]);
    }

    /** 
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'descripcion'    => 'required',
            'horario' => 'required',
            'valor' => 'required',
            'profesor_id' => 'required',

        ]);

        $row = new Curso();
        $row->fill($request->all());
        $row->save();
        return redirect()->route('cursos.index');
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
        $row = Curso::whereId($id)->first();
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

    public function ajax_curso(Request $request){
        $s = $request->s;
        $q = str_replace(' ','%',"{$request->q}").'%';
        $result = Curso::select(
                                'id as id',
                                'descripcion as text'
                            )                            
                            ->orWhere(DB::raw("CONCAT('apellido','nombre')"),'LIKE',$q)
                            ->orderBy('descripcion')
                            ->limit(env('RESULT_SELECT2',20))
                            ->get();
        return response()->json(['results' => $result]);
    }

    public function ajax_curso2(Request $request){
        $s = $request->s;
        $q = str_replace(' ','%',"{$request->q}").'%';
        $result = VCursoProfesor::select(
                                'id',
                                'text'
                            )                            
                            ->orWhere('text','LIKE',$q)
                            ->orderBy('text')
                            ->limit(env('RESULT_SELECT2',20))
                            ->get();
        return response()->json(['results' => $result]);
    }

}
