<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracast\Flash\Flash;
use Validator;
use DateTime;
use App\Http\Requests;
use App\Inscripcion;
use App\DatosBasicos;
use App\Momentos;
use App\Calificaciones;
use App\Periodos;
use App\Boletin;
use App\Asignaturas;

class BoletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscripcion=Inscripcion::all();
        $boletin=Boletin::all();
        $num=0;
        $cali=Boletin::all();
        
        
        return View('admin.educacion_basica.index', compact('num','inscripcion','boletin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('asdasdsdas');
    }

    public function crear($id_datosBasicos, $id_periodo)
    {
    	
    	$inscripcion=Inscripcion::where('id_datosbasicos',$id_datosBasicos)->get()->first();
        
        
        
    	$asignaturas=Asignaturas::all();
       	$datobasico=DatosBasicos::find($id_datosBasicos);
       	$periodos=Periodos::find($id_periodo);
       	$boletin=Boletin::all();
       	$cali=Boletin::where('id_datosBasicos',$id_datosBasicos)->where('id_periodo',$id_periodo)->get();
        $cali2=Boletin::where('id_datosBasicos',$id_datosBasicos)->where('id_periodo',$id_periodo)->where('lapso',2)->get();
        //->

        if (count($cali)==null ||  count($cali)==0) {
           $cali=0;
           return View('admin.educacion_basica.create1', compact('boleta','datobasico','periodos','boletin','cali','asignaturas','inscripcion'));
        }else{



            return View('admin.educacion_basica.create', compact('boleta','datobasico','periodos','boletin','cali','cali2','asignaturas','inscripcion'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

    	$lapso=Boletin::where('id_datosBasicos',$request->id_datosBasicos)->where('id_periodo',$request->id_periodo)->get()->first();
        $datobasico=DatosBasicos::find($request->id_datosBasicos);


        $inscri=Boletin::where('id_datosBasicos',$request->id_datosBasicos)->get()->first();
       

        

        	if (count($lapso) == 1) {
                
        		for($i=0;$i<count($request->id_asignatura);$i++){
                       $crear=Boletin::create([
	                    'id_asignatura' => $request->id_asignatura[$i],
	                    'lapso' => 2,
	                    'inasistencias' => $request->inasistencias[$i],
	                    'calificacion' => $request->calificacion[$i],
	                    'id_datosBasicos' => $request->id_datosBasicos,
	                    'id_periodo' => $request->id_periodo,
	                    'sugerencias' => 0
	                	]);
                }

        	}elseif(count($lapso) == 2 ){

        		for($i=0;$i<count($request->id_asignatura);$i++){
                       $crear=Boletin::create([
	                    'id_asignatura' => $request->id_asignatura[$i],
	                    'lapso' => 3,
	                    'inasistencias' => $request->inasistencias[$i],
	                    'calificacion' => $request->calificacion[$i],
	                    'id_datosBasicos' => $request->id_datosBasicos,
	                    'id_periodo' => $request->id_periodo,
	                    'sugerencias' => 0
	                	]);
                }
            }else{

        		for($i=0;$i<count($request->id_asignatura);$i++){
                       $crear=Boletin::create([
	                    'id_asignatura' => $request->id_asignatura[$i],
	                    'lapso' => $request->lapso,
	                    'inasistencias' => $request->inasistencias[$i],
	                    'calificacion' => $request->calificacion[$i],
	                    'id_datosBasicos' => $request->id_datosBasicos,
	                    'id_periodo' => $request->id_periodo,
	                    'sugerencias' => 0
	                	]);
                }
            }

                flash('REGISTRO DE NOTAS DE LAPSO DEL ESTUDIANTE REGISTRADO CON ÉXITO!','success');
            
        $cali=Boletin::where('id_datosBasicos',$request->id_datosBasicos)->where('id_periodo',$request->id_periodo)->get();
        if (count($cali)==null) {
           $cali=0;
        }

        return redirect()->route('admin.educacion_basica.index');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
