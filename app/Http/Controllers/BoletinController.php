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
use App\Seccion;

class BoletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodo=Periodos::where('status','Activo')->get()->first();
        $secciones=Seccion::all();
        $inscripcion=Inscripcion::all();
        $boletin=Boletin::all();
        $num=0;
        $cali=Boletin::all();
        
        
        return View('admin.educacion_basica.index', compact('num','inscripcion','boletin','secciones','periodo'));
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

    public function crear($id_seccion, $id_periodo)
    {
    	
    	$inscripcion=Inscripcion::where('id_seccion',$id_seccion)->get();
        $inscripcion2=Inscripcion::where('id_seccion',$id_seccion)->get()->first();
        $seccion=Seccion::find($id_seccion);

        $num=0;
    	$asignaturas=Asignaturas::where('id_curso',$seccion->curso->id)->get();
       	$periodos=Periodos::find($id_periodo);
       	$boletin=Boletin::all();
       	



            return View('admin.educacion_basica.create', compact('boleta','datobasico','periodos','boletin','cali','cali2','asignaturas','inscripcion','inscripcion2','num'));
        
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
