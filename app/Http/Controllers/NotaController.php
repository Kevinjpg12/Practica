<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Nota;
use App\Models\VPlanillaAlumno;
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
        $row = Nota::whereId($id)->first();
        return view('notas.nota_formulario',[
            'row'   => $row,
            'mode'  => 'edit',
            'url'   => route('notas.update',$row->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'nombre'    => 'required|min:2',
        //     'apellidos' => 'required',
        // ]);

        $row = Nota::whereId($id)->first();
        $row->fill($request->all());
        $row->save();
        return redirect()->route('notas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Nota::whereId($id)->first();
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
    public function ajax_nota(Request $request){
        $s = $request->s;
        $q = str_replace(' ','%',"{$request->q}").'%';
        $result = VPlanillaAlumno::select(
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
