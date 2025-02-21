<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function reporte1_buscar(){
        return view('reporte.reporte1_buscar');
    }

    public function reporte1_buscar_submit(Request $request){
        $periodo = $request->periodo;
        /* 
        
        
        
        */
        return view('reporte.reporte1_resultado');
    }

}
